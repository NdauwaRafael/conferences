<template>
  <div>
    <h3>Users Data</h3>
    <ul v-for="user in users">
      <li>{{user.username}}</li>
      <li>{{user.fname}}</li>
      <li>{{user.lname}}</li>
      <li>{{user.email}}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data(){
    return {
      users: [],
    }
  },
  created(){
    this.fetchUserData();
    console.log(this.users );
  },
  methods: {
    fetchUserData: function() {
      this.$http.get('/users').then(response =>{
        this.users = response.data.users;
      })
    }
  }
}
</script>

<style lang="css">
</style>
