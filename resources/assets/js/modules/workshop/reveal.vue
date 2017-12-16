<template >
  <div class="">
    <table>
      <tbody>
        <tr>
          <td>Workshop Name</td>
          <td>{{workshop.event_name}}</td>
        </tr>
        <tr>
          <td>Workshop Theme</td>
          <td>{{workshop.theme}}</td>
        </tr>
        <tr>
          <td>For Who:</td>
          <td>{{workshop.audience}}</td>
        </tr>
        <tr>
          <td>Location:</td>
          <td>{{workshop.location}}</td>
        </tr>
        <tr>
          <td>Number of people:</td>
          <td>{{workshop.number}}</td>
        </tr>
        <tr>
          <td>When:</td>
          <td>{{workshop.when}}</td>
        </tr>
        <tr>
          <td>Created by:</td>
          <td>{{workshop.user.name}}</td>
        </tr>
        <tr>
          <td>Enhance:</td>
          <td><el-button>Add Agendas</el-button></td>
          <td><el-button type="danger">Delete Workshop</el-button></td>
        </tr>
      </tbody>
    </table>

    <h4>Added Agendas</h4>
    <table>
      <thead>
        <tr>
          <th >#</th>
          <th>Time</th>
          <th >Agenda Name</th>
        </tr>
      </thead>
      <tbody>
      <tr>
        <td>Content Goes Here</td>
        <td>Content Goes Here</td>
        <td>Content Goes Here</td>
      </tr>
    </tbody>
  </table>

  </div>
</template>

<script>
export default {
}
</script>
