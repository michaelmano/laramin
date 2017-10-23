import Q from 'qoob';
import pre from './components/pre';
import form from './components/form';
import sortable from './components/sortable';
import crop from './components/crop';

const module = function module() {
  Q.documentReady(() => {
    form();
    pre();
    sortable();
    crop();
  });  
};

export default module;