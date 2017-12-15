<template>
  <div class="welcome-banner">
    <div class="transparent-register">
      <div class="grid-x">
          <div class="large-3 cell"></div>
          <div class="large-6 cell form">
            <h3>Sign Up to Instant Conference</h3>
              <el-form :model="initReg" ref="initReg" label-width="120px" class="demo-ruleForm">
                  <el-form-item  prop="text" label="First Name"  >
                    <small v-if="error.fname">{{error.fname}}</small>
                      <el-input v-model="initReg.fname"></el-input>
                  </el-form-item>

                  <el-form-item  prop="text" label="Last Name" >
                      <el-input v-model="initReg.lname"></el-input>
                  </el-form-item>

                  <el-form-item  prop="email" label="Email" :rules="[
                    { required: true, message: 'Please input email address', trigger: 'blur' },
                    { type: 'email', message: 'Please input correct email address', trigger: 'blur,change' }
                  ]" >
                      <el-input v-model="initReg.email"></el-input>
                  </el-form-item>

                  <el-form-item label="Password" prop="pass" :rules="[
                    { required: true, message: 'Please input a password', trigger: 'blur' },
                    { min: 6, max: 15, message: 'Please input a valid password between 6 to 15 Characters', trigger: 'blur,change' }
                  ]">
                      <el-input type="password" v-model="initReg.pass" auto-complete="off"></el-input>
                  </el-form-item>

                  <el-form-item label="Confirm" prop="checkPass">
                      <el-input type="password" v-model="initReg.checkPass" auto-complete="off"></el-input>
                  </el-form-item>

                  <el-form-item>
                      <el-button type="danger" :plain="true" @click="regUser('initReg')">Create User</el-button>
                      <el-button type="text" >Go to Login Page</el-button>
                  </el-form-item>
              </el-form>
          </div>
          <div class="large-3 cell"></div>
      </div>
    </div>
  </div>

</template>
<script>
import {post} from '../../helpers/api.js'
 export default {
     name: 'initial_signup',
     data(){

         var validatePass = (rule, value, callback) => {
             if (value === '') {
                 callback(new Error('Please input the password'));
             } else {
                 if (this.initReg.checkPass !== '') {
                     this.$refs.initReg.validateField('checkPass');
                 }
                 callback();
             }
         };
         var validatePass2 = (rule, value, callback) => {
             if (value === '') {
                 callback(new Error('Please input the password again'));
             } else if (value !== this.initReg.pass) {
                 callback(new Error('Two inputs don\'t match!'));
             } else {
                 callback();
             }
         };
         return {
             initReg: {
                 fname: '',
                 lname: '',
                 email: '',
                 pass: '',
                 checkPass: ''
             },
         }


     },
     methods: {
         regUser: function(initReg){
             this.$refs[initReg].validate((valid) => {
                 if (valid) {
                   //initialize registration
                   this.isProcessing = true
                   this.error = {}
                   post('/api/register', this.form)
                   .then((res)=>{
                     if (res.resgistered) {
                        this.router.push('/login')
                     }
                     this.isProcessing = false;
                   })
                   .catch((err)=>{
                     if(err.respose.status===422){
                       this.error = err.response.data;
                     }
                     this.isProcessing = false;
                   })
                 } else {
                     console.log('error submit!!');
                     return false;
                 }
             });
        }
     }
 }
</script>
