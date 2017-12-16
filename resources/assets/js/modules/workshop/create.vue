<template >
  <div class="create-form">
    <h5 class="heading ">New WorkShop</h5>
    <div class="grid-x grid-margin-x">
      <div class="cell small-2"></div>
      <div class="cell small-8">

        </el-form>

        <form>
            <label>Event Name
                <input type="text" v-model="workshop_Frm.eventName" placeholder="Event Name">
            </label>
            <label>Event Theme
                <input type="text" v-model="workshop_Frm.eventTheme" placeholder="Event Theme">
            </label>
            <label>For Who?
                <input type="text" v-model="workshop_Frm.eventAudience" placeholder="Tageted participants">
            </label>
            <label>Attendants Number
                <input type="text" v-model="workshop_Frm.eventNumber" placeholder="Number of Attendants">
            </label>
            <label>Location
                <input type="text" v-model="workshop_Frm.eventLocation" placeholder="Event Location">
            </label>
            <label>When
                <input type="date" v-model="workshop_Frm.eventDate" placeholder="Agenda Duration (Minutes)">
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
export default {
  data(){
      return {
          workshop_Frm: {
              eventName: '',
              eventTheme: '',
              eventGoal: '',
              eventAudience: '',
              eventNumber: '',
              eventLocation: '',
              eventDate: ''

          }

      }
  },
  methods: {
      create: function () {
        if (JSON.parse(localStorage.getItem('workshoplist'))===null) {
          var b = [];
          localStorage.setItem('workshoplist', JSON.stringify(b));
          var c = JSON.parse(localStorage.getItem('workshoplist'));
          c.push(this.workshop_Frm);
          localStorage.setItem('workshoplist', JSON.stringify(c));
        }else{
          var a = JSON.parse(localStorage.getItem('workshoplist'));
          a.push(this.workshop_Frm);
          localStorage.setItem('workshoplist', JSON.stringify(a));
        }
      }
          }
}
</script>

<style lang="css">
</style>
