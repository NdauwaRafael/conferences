<template >
  <div class="modify-workshop">
    <h4 class="heading ">Modify</h4>

      <div class="grid-x grid-margin-x">
        <div class="cell small-4 add-agenda">
          <h5>Create Agenda For Event</h5>
            <form>
                <label>Agenda Name
                    <input type="text" placeholder="Agenda Name">
                </label>
                <label>Agenda Duration
                    <input type="text" placeholder="Agenda Duration (Minutes)">
                </label>

                <label>
                    <button type="button" class="success button">Save</button>
                </label>
            </form>
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
