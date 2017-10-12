import Q from 'qoob';
import pre from './components/pre';
import form from './components/form';

const module = function module() {
  Q.documentReady(() => {
    form();
    pre();
  });  
};

export default module;