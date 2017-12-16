<template >
  <div class="modify-workshop">
    <h4 class="heading ">Modify</h4>

      <div class="grid-x grid-margin-x">
        <div class="cell small-4 add-agenda">
          <h5>Create Agenda For Event</h5>
            <form>
                <label>Agenda Name
                    <input type="text" v-model="agendaForm.name" placeholder="Agenda Name">
                </label>
                <label>Agenda Duration
                    <input type="number" v-model="agendaForm.duration" placeholder="Agenda Duration (Minutes)">
                </label>

                <label>
                    <button @click="addAgenda" type="button" class="success button">Save</button>
                </label>
            </form>
        </div>

        <div class="cell small-4 all-agendas">
           <h5>All Agendas</h5>
        </div>

        <div class="cell small-4 cat-agendas">
          <h5>Categorised Agendas</h5>
        </div>
      </div>

    </div>
</template>

<script>
import ElInputNumber from "../../../../../node_modules/element-ui/packages/input-number/src/input-number.vue";

export default {
    components: {ElInputNumber},

    data(){
      return {
        agendaForm: {
          name: '',
          duration: ''
        }
      }
    },
    methods: {
      addAgenda(){
        if (JSON.parse(localStorage.getItem('agendas'))===null) {
          var b = [];
          localStorage.setItem('agendas', JSON.stringify(b));
          var c = JSON.parse(localStorage.getItem('agendas'));
          c.push(this.agendaForm);
          localStorage.setItem('agendas', JSON.stringify(c));
        }else{
          var a = JSON.parse(localStorage.getItem('agendas'));
          a.push(this.agendaForm);
          localStorage.setItem('agendas', JSON.stringify(a));
        }
      }
    }
}
</script>

<style lang="css">
</style>
