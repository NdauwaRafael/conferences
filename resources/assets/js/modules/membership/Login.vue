<template >
  <div class="welcome-banner" >
      <div class="transparent-register">
        <div class="grid-container">
            <el-container>
                <el-header></el-header>
                <el-main>
                  <div class="login-form-div">
                    <h3>Login</h3>
                    <el-form :model="loginForm" class="loginform">
                        <el-form-item label="Email Address" >
                            <el-input type="text" v-model="loginForm.email" ></el-input>
                            <small v-if="error.email" class="display-error">{{error.email[0]}}</small>
                        </el-form-item>

                        <el-form-item label="Password" prop="pass">
                            <el-input type="password" v-model="loginForm.password" auto-complete="off"></el-input>
                        </el-form-item>

                        <el-form-item>
                            <el-button v-on:click="login" type="primary" >Login</el-button>
                            <router-link  :to="{path: '/register'}" >
                              <el-button type="text" >
                                Sign Up
                            </el-button>
                            </router-link>
                        </el-form-item>

                    </el-form>
                  </div>
                </el-main>
            </el-container>
        </div>
      </div>
    </div>
</template>

<script>
import {post} from '../../helpers/api'
import Auth from '../../store/auth'
export default {
  name: 'Login' ,
  data(){
         return {
             loginForm: {
                 password:'',
                 email:'',
             },
             error: {}
         }
     },
methods: {
    login: function () {
      //initialize registration
      this.isProcessing = true
      this.error = {}
      post('/api/login', this.loginForm)
      .then((res)=>{
        if (res.data.authenticated) {
           this.$router.push('/home')
           Flash.setSuccess('You have successfully Logged In into rapid conferences');
           Auth.set(res.data.api_token, res.data.user_id)
        }
        this.isProcessing = false
      })
      .catch((err)=>{
        if(err.response.status===422){
          this.error = err.response.data;
          this.$message.error('Oops, Regretful but an Error have occurred.');
        }
        this.isProcessing = false;
      })
    }
}
}
</script>

<style lang="css">
</style>
