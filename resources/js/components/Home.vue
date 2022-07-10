<template>
  <div class="row" style="margin-top: 5px">
    <div class="col-md-3 container" style="margin-top: 20px">
      <div class="row">
        <div class="col-auto gift" style="padding: 0px">
          <img :src="img('rose.png')" />
        </div>
        <div class="col" style="margin-top: 20px">
          <h4>Reproduz meme do Bolsonaro</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-auto gift" style="padding: 0px">
          <img :src="img('tiktok.png')" />
        </div>
        <div class="col" style="margin-top: 20px">
          <h4>Reproduz meme do Lula</h4>
        </div>
      </div>
      <br>
      <div class="row">
        <list :list="list"/>
      </div>
    </div>
    <panel-picture name="Lula" image="lula.png" />
    <div class="col-md-1 duel">
      <img :src="img('x.png')" />
    </div>
    <panel-picture name="Bolsonaro" image="bolsonaro.png" />
  </div>
</template>

<style>
.duel {
  position: absolute;
  top: 60%;
  right: 29%;
}

.duel img {
  width: 100%;
  height: 40%;
}

.gift img {
  width: 60px;
  height: 60px;
}
</style>

<script>
import PanelPicture from "./PanelPicture.vue";
export default {
  components: { PanelPicture },
  data () {
    return {
      list: [],
      loading: true,
    }
  },
  created() {
    this.getData();
  },
  methods: {
    getData() {
      axios
      .get("http://0.0.0.0:8000/api/getMoviment")
       .then(response =>{
          this.list = response.data.data;
        })
      .catch(function (error) {
        console.log(error);
      })
    }
  }
};
</script>
