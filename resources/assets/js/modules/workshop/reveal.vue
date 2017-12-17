<template >
  <div class="">
    <table>
      <tbody>
        <tr>
          <td>Workshop Name</td>
          <td colspan="3">{{workshop.event_name}}</td>
        </tr>
        <tr>
          <td>Workshop Theme</td>
          <td colspan="3">{{workshop.theme}}</td>
        </tr>
        <tr>
          <td>For Who:</td>
          <td colspan="3">{{workshop.audience}}</td>
        </tr>
        <tr>
          <td>Location:</td>
          <td colspan="3">{{workshop.location}}</td>
        </tr>
        <tr>
          <td>Number of people:</td>
          <td colspan="3">{{workshop.number}}</td>
        </tr>
        <tr>
          <td>When:</td>
          <td colspan="3">{{workshop.when}}</td>
        </tr>
        <tr>
          <td>Created by:</td>
          <td colspan="3">{{workshop.user.name}}</td>
        </tr>
        <tr>
          <td>Enhance:</td>
          <td>
          <router-link :to="`/view/${workshop.id}/addSession`">
            <el-button>Add Logic Sessions</el-button>
          </router-link>
        </td>

          <td>
            <router-link :to="`/view/${workshop.id}/AddAgenda`">
              <el-button>Add Agendas</el-button>
            </router-link>
            </td>

          <td ><el-button @click="remove" type="danger">Delete Workshop</el-button></td>
        </tr>
      </tbody>
    </table>

    <div class="sessions">
      <h4>Logical Sessions | Themes</h4>
      <table>
        <thead>
          <tr>
            <th >#</th>
            <th>Time</th>
            <th >Session Name</th>
          </tr>
        </thead>
        <tbody>
        <tr v-for="lsession in  workshop.lsessions">
          <td>#</td>
          <td>{{ lsession.session_time}}</td>
          <td>{{lsession.session_name}}</td>
        </tr>
      </tbody>
    </table>
    </div>

    <div class="agenda">
      <h4>Added Agendas</h4>
      <table>
        <thead>
          <tr>
            <th >#</th>
            <th>Assigned Name</th>
            <th >Agenda Duration</th>
            <th>Logic Session</th>
          </tr>
        </thead>
        <tbody>
        <tr v-for="agenda in  workshop.agendas">
          <td>#</td>
          <td>{{agenda.agenda_name}}</td>
          <td>{{agenda.agenda_duration}} Minutes</td>
          <td>Nill</td>
        </tr>
      </tbody>
    </table>
    </div>

  </div>
</template>

<script>
import Auth from '../../store/auth'
import {get, del} from '../../helpers/api'
import Flash from '../../helpers/flash'
export default {
  data(){
    return {
      auth:Auth.state,
      workshop: {
        user: {},
        agendas: [],
        lsessions: []
    },
    isDeleting: false
    }
  },

  created(){
    get(`/api/workshop/${this.$route.params.id}`)
    .then((res)=>{
      this.workshop = res.data.workshop

    })
  },

  methods: {
    remove(){
      this.isDeleting = false
      del(`/api/workshop/${this.$route.params.id}`)
      .then((res)=>{
        if(res.data.deleted){
          Flash.setSuccess('Workshop data has been deleted successfully');
          this.$router.push('/view');
        }
      })
    }
  }
}
</script>
