<template >
  <div class="create-form">
    <h5 class="heading ">New WorkShop</h5>
    <div class="grid-x grid-margin-x">
      <div class="cell small-2"></div>
      <div class="cell small-8">

        </el-form>

        <form>
            <label>Event Name
                <input type="text" v-model="workshop_Frm.event_name" placeholder="Event Name">
            </label>
            <label>Event Theme
                <input type="text" v-model="workshop_Frm.theme" placeholder="Event Theme">
            </label>
            <label>For Who?
                <input type="text" v-model="workshop_Frm.audience" placeholder="Tageted participants">
            </label>
            <label>Attendants Number
                <input type="text" v-model="workshop_Frm.number" placeholder="Number of Attendants">
            </label>
            <label>Location
                <input type="text" v-model="workshop_Frm.location" placeholder="Event Location">
            </label>
            <label>When
                <input type="date" v-model="workshop_Frm.when" placeholder="Agenda Duration (Minutes)">
            </label>

            <label>
                <button v-on:click="create"  type="button" class="success button">Create Workshop</button>
            </label>
        </form>

      </div>
      <div class="cell small-2"></div>
    </div>


  </div>
</template>

<script>
import Auth from '../../store/auth'
import {post} from '../../helpers/api'
export default {
  data(){
      return {
          workshop_Frm: {
            event_name: '',
            theme: '',
            audience: '',
            number: '',
            location: '',
            when: ''
                    }

      }
  },
  methods: {
      create: function () {
        post('/api/workshop', this.workshop_Frm)
        .then((res)=>{
          if (res.data.saved) {
             this.$router.push('/view')
             this.$message({
             message: 'You have successfully Created an Event.',
             type: 'success'
           });
          }
        })
        .catch((errr)=>{
          this.$message.error(errr.message);
        })
      }
          }
}
</script>

<style lang="css">
</style>
