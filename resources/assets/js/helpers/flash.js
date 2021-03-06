import { Message } from 'element-ui';
export default {
  state: {
    success: null,
    error: null
  },

  setSuccess(msg){
    this.state.success = msg
    setTimeout(()=>{
      this.removeSuccess()
    }, 3000)
  },

  setError(message){
    this.state.console.error = message;

    setTimeout(()=>{
      this.removeError()
    }, 3000)
  },

  removeSuccess(){
    this.state.success = null
  },

  removeError(){
    this.state.error = null
  }
}
