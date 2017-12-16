<template >
  <div>

    <div class="user">
    <h4 class="heading">Instance Conferences</h4>
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
