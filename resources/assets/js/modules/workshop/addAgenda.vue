<template>
  <div >
    <h3 class="heading">Add Agenda for the Event</h3>

    <div class="grid-x">
      <div class="large-2 cell"></div>
      <div class="large-8 cell">
        <form>
            <label>Agenda Name
                <input type="text" v-model="sessionForm.session_name" placeholder="Session Name">
            </label>
            <label>Assign Duration (Minutes)
                <input type="number" v-model="sessionForm.session_time" placeholder="Session Time">
            </label>
            <label>Agenda Description
                <textarea v-model="sessionForm.description" placeholder="Sesstion Duration (Minutes)" rows="8" cols="80"></textarea>
            </label>

            <label>
                <el-button @click="addAgenda" type="success">Add Session</el-button>
            </label>
        </form>
      </div>

      <div class="large-2 cell"></div>
    </div>
  </div>
</template>



<script>
import Auth from '../../store/auth'
import {get, post} from '../../helpers/api'
import Flash from '../../helpers/flash'
export default {
  data(){
    return {
      agendaForm: {
        agenda_name: '',
        agenda_duration: ''
      }
      // error: {},
      // initializeURL: '/api/view/create',
      // action: 'Create'

    }
  },
  created(){
 this.sessionForm.workshop_id = this.$route.params.id
  },

  methods: {

    addSession(){

      post('/api/addSession', this.sessionForm)
        .then((res)=>{
          if (res.data.added) {
              this.$message({
                message: 'Logical session has been successfully added',
                type: 'success'
              });
              this.$router.push(`/view/${this.$route.params.id}`)
          }
        })
        .catch((err)=>{
          this.$message.error(err.message);
        })
    }
  }
}
</script>
