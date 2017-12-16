<template>
  <div class="welcome-banner">
    <div class="transparent-register">
      <div class="grid-x top">
          <div class="large-3 cell"></div>
          <div class="large-6 cell form">
            <h3>Sign Up to Instant Conference</h3>
              <el-form :model="initReg" ref="initReg" label-width="120px" class="demo-ruleForm">
                <el-form-item  prop="text" label="User Name"  >
                  <small v-if="error.username">{{error.username}}</small>
                    <el-input v-model="initReg.username"></el-input>
                </el-form-item>

                  <el-form-item  prop="text" label="First Name"  >
                    <small v-if="error.fname">{{error.fname}}</small>
                      <el-input v-model="initReg.fname"></el-input>
                  </el-form-item>

                  <el-form-item  prop="text" label="Last Name" >
                      <el-input v-model="initReg.lname"></el-input>
                      <small v-if="error.lname">{{error.lname}}</small>
                  </el-form-item>

                  <el-form-item  prop="email" label="Email" >
                      <el-input v-model="initReg.email"></el-input>
                      <small v-if="error.email">{{error.email}}</small>
                  </el-form-item>

                  <el-form-item label="Password" prop="pass">
                      <el-input type="password" v-model="initReg.password" auto-complete="off"></el-input>
                      <small v-if="error.password">{{error.password}}</small>
                  </el-form-item>

                  <el-form-item label="Confirm" prop="checkPass">
                      <el-input type="password" v-model="initReg.confirmed" auto-complete="off"></el-input>
                  </el-form-item>

                  <el-form-item>
                      <el-button :disabled="isProcessing" type="danger" :plain="true" @click="regUser()">Create User</el-button>
                      <router-link :to="{path: '/login'}">
                        <el-button type="text" >Go to Login Page</el-button>
                      </router-link>
                  </el-form-item>
              </el-form>
          </div>
          <div class="large-3 cell"></div>
      </div>
    </div>
  </div>

</template>
<script>
import {post} from '../../helpers/api'
import Flash from '../../helpers/flash'
 export default {
     name: 'register',
     data(){

         return {
             initReg: {
                 username: '',
                 fname: '',
                 lname: '',
                 email: '',
                 password: '',
                 confirmed: ''
             },

             error: {},

             isProcessing: false
         }


     },
     methods: {
         regUser: function(){
             //initialize registration
             this.isProcessing = true
             this.error = {}
             post('/api/register', this.initReg)
             .then((res)=>{
               if (res.data.registered) {
                  this.$router.push('/login')
                  Flash.setSuccess('Welcome Onboard!! Your data has been Registered successfully. Just one more step, please Login!!.');
               }
               this.isProcessing = false
             })
             .catch((err)=>{
               if(err.response.status===422){
                 this.error = err.response.data;
                 this.$message.error('Oops, Regretful but an Error have occurred.' + err.response.data);
               }
               this.isProcessing = false;
             })
        }
     }
 }
</script>
