<template>
    <div>
        
    </div>
</template>

<style>
.card_count {
  margin-top: 10px;
}
</style>

<script>
export default {
  props: {
    list: {
      type: Array,
      required: true,
      // default: '../../images/bolsonaro.png'
    },
  },
  mounted() {
    console.log(this.list);
  },
};
</script>
