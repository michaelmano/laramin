<template>
    <div @click="focus()" ref="tags" class="Tags">
        <span v-for="(tag, index) in tagsArray" v-bind:key="index" class="Tag">
            <div class="Tag__name">{{ tag }} <a @click.prevent.stop="remove(tag)"><i class="Tag__remove fa fa-times"></i></a></div>
            <input v-if="name" :name="name" :value="tag" type="hidden">
        </span>
        <div class="Tags__input-wrapper">
            <input
                v-bind:placeholder="placeholder"
                type="text"
                v-model="newTag"
                @keydown.delete.stop="removeLastTag()"
                @keydown.enter.188.tab.prevent.stop="addTag(newTag)"
                @input="autocompleteShow()"
                @keydown.up="autocompleteUp()"
                @keydown.down="autocompleteDown()"
                class="Tags__input"
            />
            <ul v-if="autocompleteSuggestions.length >= 1" class="Tags__list">
                <li
                    class="Tags__list-item"
                    ref="li"
                    v-for="(suggestion, index) in autocompleteSuggestions"
                    v-text="suggestion"
                    @click="autocompleteIndex = -1; addTag(suggestion)">
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

    export default {
        props: {
            name: {
                type: String,
                default: ''
            },
            tags: {
                type: Array,
                default: function () { return [] }
            },
            autocomplete: {
                type: Array,
                default: function () { return [] }
            },
            placeholder: {
                type: String,
                default: ''
            },
            onChange: {
                type: Function
            },
        },
        data () {
            return {
                tagsArray: this.tags,
                newTag: '',
                autocompleteSuggestions: [],
                autocompleteIndex: -1
            }
        },
        methods: {
            focus() {
                this.$refs.tags.focus()
            },
            addTag(tag) {
                if (tag && !this.tagsArray.includes(tag)) {
                    if (this.autocompleteIndex !== -1) {
                        if (!this.tagsArray.includes(this.autocompleteSuggestions[this.autocompleteIndex])) {
                            this.tagsArray.push(this.autocompleteSuggestions[this.autocompleteIndex])
                        }
                    } else {
                        if (tag.replace(/\s/g, '').length) {
                            this.tagsArray.push(tag)
                        }
                    }
                    this.emitChanges()
                }
                this.newTag = ''
                this.autocompleteSuggestions = []
                this.autocompleteIndex = -1
            },
            remove(tag) {
                this.tagsArray = this.tagsArray.filter(function (item) {
                    return tag !== item
                });
                this.emitChanges()
            },
            removeLastTag() {
                if (this.newTag) { return }
                this.tagsArray.pop()
                this.emitChanges()
            },
            emitChanges() {
                if (this.onChange) {
                    this.onChange(JSON.parse(JSON.stringify(this.tagsArray)))
                }
            },
            autocompleteShow() {
                if (this.newTag === '') {
                    this.autocompleteSuggestions = []
                } else {
                    this.autocomplete.forEach((word, index) => {
                        if (word.match(this.newTag) !== null && this.newTag !== '') {
                            if (!this.autocompleteSuggestions.includes(word)) {
                                this.autocompleteSuggestions.push(word)
                            }
                        } else {
                            this.autocompleteSuggestions.splice(index, 1)
                        }
                    })
                }
            },
            autocompleteUp() {
                (this.autocompleteIndex <= 1 ? this.autocompleteIndex = 0 : this.autocompleteIndex--)
                this.$refs.li.forEach(li => {
                    li.classList.remove('active');
                });
                this.$refs.li[this.autocompleteIndex].classList.add('active');
            },
            autocompleteDown() {
                (this.autocompleteIndex < this.$refs.li.length-1 ? this.autocompleteIndex++ : '')
                this.$refs.li.forEach(li => {
                    li.classList.remove('active');
                });
                this.$refs.li[this.autocompleteIndex].classList.add('active');
            }
        }
    }
</script>