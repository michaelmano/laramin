import Q from 'qoob';
import example from './components/example';

const module = function module() {
  Q.documentReady(() => {
      console.log('vanilla loaded');
  });  
};

export default module;