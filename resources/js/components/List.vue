<template>
  <div class="row">
    <img class="rounded" :src="img(image)" style="height: 80%" />
    <div class="d-flex justify-content-center card_count">
      <h1 style="color: red">10&thinsp;</h1>
      <h1>votos</h1>
    </div>
    <div class="d-flex justify-content-center">
      <h2>Digite "/{{ name }}" para votar</h2>
    </div>
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
    image: {
      type: String,
      required: true,
      // default: '../../images/bolsonaro.png'
    },
    name: {
      type: String,
      required: true,
    },
  },
  mounted() {
    console.log("Component mounted.");

    axios
      .get("http://0.0.0.0:8000/api/getMoviment")
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(1);
      });
  },
};
</script>
