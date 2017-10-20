import Q from 'qoob';
import pre from './components/pre';
import form from './components/form';
import sortable from './components/sortable';

const module = function module() {
  Q.documentReady(() => {
    form();
    pre();
    sortable();
  });  
};

export default module;