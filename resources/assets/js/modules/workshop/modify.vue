<template >
  <div class="modify-workshop">
    <h4 class="heading ">Modify</h4>

      <div class="grid-x grid-margin-x">
        <div class="cell small-4">
          <h5>Create Agenda For Event</h5>
          <el-form>
              <el-form-item  label="Agenda Name">
                  <el-input ></el-input>
              </el-form-item>

              <el-form-item  label="Agenda Name" style="width: 100%;" >
                <el-time-select
                  v-model="value1"
                  :picker-options="{
                    start: '08:30',
                    step: '00:15',
                    end: '18:30'
                  }"
                  placeholder="Select time">
                </el-time-select>
              </el-form-item>

              <el-form-item label="Duration (minutes)">
                  <el-input-number controls-position="right"  :min="10" :max="300"></el-input-number>
              </el-form-item>

              <el-form-item >
                  <el-button v-on:click="create" type="primary">Create Agenda</el-button>
              </el-form-item>
          </el-form>
        </div>

        <div class="cell small-4">
           <h5>All Agendas</h5>
        </div>

        <div class="cell small-4">
          <h5>Categorised Agendas</h5>
        </div>
      </div>

    </div>
</template>

<script>
import ElInputNumber from "../../../../../node_modules/element-ui/packages/input-number/src/input-number.vue";

export default {
    components: {ElInputNumber}
}
</script>

<style lang="css">
</style>
