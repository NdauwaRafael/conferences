<template >
  <div>
    <h4>Instance Conferences</h4>
    <div class="user">
        <div class="user-img">
            <p><img src="icons/user.png"></p>
        </div>
        <h4></h4>
        <p><i class="fa fa-circle" aria-hidden="true" style="color:green; font-size: 16px"></i>  Role</p>

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

            <li>
              <i class="el-icon-setting" ></i>
              <span>Settings</span>
            </li>
          </ul>

        </div>

    </div>
  </div>
</template>

<script>
export default {
}
</script>
