<template >
  <div class="create-form">
    <h5 class="heading ">New WorkShop</h5>
    <div class="grid-x grid-margin-x">
      <div class="cell small-2"></div>
      <div class="cell small-8">
        <el-form>
            <el-form-item  label="Event Name">
                <el-input v-model="workshop_Frm.eventName"></el-input>
            </el-form-item>

            <el-form-item label="Theme ">
                <el-input v-model="workshop_Frm.eventTheme"></el-input>
            </el-form-item>

            <el-form-item label="Goal">
                <el-input v-model="workshop_Frm.eventGoal"></el-input>
            </el-form-item>

            <el-form-item label="For Who">
                <el-input v-model="workshop_Frm.eventAudience"></el-input>
            </el-form-item>

            <el-form-item label="Number of people">
                <el-input v-model="workshop_Frm.eventNumber"></el-input>
            </el-form-item>

            <el-form-item label="Location">
                <el-input v-model="workshop_Frm.eventLocation"></el-input>
            </el-form-item>

            <el-form-item label="When">
                    <el-date-picker type="date" placeholder="Pick a date" v-model="workshop_Frm.eventDate" style="width: 100%;" > </el-date-picker>
            </el-form-item>

            <el-form-item>
                <el-button v-on:click="create" type="primary">Create Workshop</el-button>
            </el-form-item>

        </el-form>
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
