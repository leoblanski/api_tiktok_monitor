<template>
  <div>
    <div class="list-header">{{title}}</div>

    <div class="container-list">
      <div class="list-body">
        <tr v-for="item in list" :key="item.id">
          <div class="col-md-4 list-tile justify-content-end">
            <img
              class="rounded-circle shadow-lg p-2"
              v-bind:src="item.url_picture"
              data-holder-rendered="true"
            />
          </div>
          <td>
            <h3>{{ item.username }}</h3>
          </td>
        </tr>
      </div>
      <div class="list-header"></div>
    </div>
  </div>
</template>

<style>
.card_count {
  margin-top: 10px;
}

.container-list {
  height: 200px;
}

.list-tile img {
  width: 80px;
  height: 80px;
}
</style>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
    list: {
      type: Array,
      required: true,
    },
  },
  mounted() {
    console.log(this.list);
  },
};
</script>
