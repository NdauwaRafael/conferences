<template >
  <div>

    <div class="user">
      <img src="/img/cytonn.png" alt="">
    <h4 class="heading">Rapid Conferences</h4>
        <div class="navigation-home">
          <ul>

           <router-link :to="{ path: '/home'}">
              <li>
                <i class="el-icon-menu" ></i>
                <span>Dashboard</span>
              </li>
            </router-link>

            <router-link :to="{ path: '/create' }">
              <li>
                <i class="el-icon-edit-outline" ></i>
                <span>New Workshop</span>
              </li>
            </router-link>

            <router-link :to="{ path: '/view' }">
              <li>
                <i class="el-icon-tickets" ></i>
                <span>List Workshops</span>
              </li>
            </router-link>

            <li>
              <i class="el-icon-bell" ></i>
              <span>Notifications</span>
            </li>

            <li @click.stop="logout">
              <i class="el-icon-setting" ></i>
              <span >Logout</span>
            </li>
          </ul>

        </div>

    </div>
  </div>
</template>

<script>
import Flash from '../../../helpers/flash'
import Auth from '../../../store/auth'
import {post} from '../../../helpers/api'
export default {
methods: {
  logout(){
      post('/api/logout')
          .then((res)=>{
          if (res.data.logged_out){
              Auth.remove()
              Flash.setSuccess('You have successfully Logged Out!')
              this.$router.push('/login')
          }
      })
          .catch((err)=>{
            console.log(err);
          })
  }
}
}
</script>
