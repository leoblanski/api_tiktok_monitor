<template>
    <div >
      <div class="">
        <div class="list-header">
          Patrocinadores da Live
        </div>
        <div class="list-body">
          <tr v-for="item in list" :key="item.id">
            <div class="col-md-4 list-tile">
              <img class="rounded-circle shadow-lg p-2" v-bind:src="item.url_picture" data-holder-rendered="true">
            </div>
            <td>{{item.username}}</td>
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

.list-tile img{
  width: 80px;
  height: 80px;
}

</style>

<script>
export default {
  props: {
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
