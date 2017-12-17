<template >
  <div class="modify-workshop">
    <h4 class="heading ">Modify</h4>

      <div class="grid-x grid-margin-x">
        <div class="cell small-4 add-agenda">
          <h5>Uncategorised Agendas</h5>
          <draggable>
            <ul v-for="ag in agendas"  >
              <li>{{ag.agenda_name}}</li>
            </ul>
          </draggable>

        </div>

        <div class="cell small-8 all-agendas">
           <h5>Agendas According to Categories</h5>
            <div class="sessioncontent">
                <!-- <div  v-for="ss in sessionLists" >
                    <div>{{ss.session_name}}</div>
                </div> -->
                <ul v-for="ses in sessionLists"  >
                  <li>{{ses.session_name}}</li>
                </ul>
            </div>
        </div>

      </div>

    </div>
</template>

<script>
import draggable from 'vuedraggable';
import Auth from '../../store/auth'
import {get, del} from '../../helpers/api'
import Flash from '../../helpers/flash'
export default {
    components: {draggable},

    data(){
      return {
        auth:Auth.state,
          agendas: [],
          sessionLists: []

      }
    },
    created(){
      get(`/api/agendaList/${this.$route.params.id}`)
      .then((res)=>{
        this.agendas = res.data.agendas
      })
      .catch((err)=>{
        this.$message.error(err.message);
      });

      get(`/api/sessionList/${this.$route.params.id}`)
      .then((resp)=>{
        this.sessionLists = resp.data.sessionList
      })
      .catch((err)=>{
        this.$message.error(err.message);
      })
    },
    methods: {
      updateSession(){

      }

    }
}
</script>

<style lang="css">
</style>
