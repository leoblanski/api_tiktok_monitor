<template>
  <div class="row" style="margin-top: 5px">
    <div class="col-md-3 container" style="margin-top: 20px">
      <div class="row">
        <div class="col-auto gift" style="padding: 0px">
          <img :src="img('rose.png')" />
        </div>
        <div class="col" style="margin-top: 20px">
          <h2>Reproduz meme do Bolsonaro</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-auto gift" style="padding: 0px">
          <img :src="img('tiktok.png')" />
        </div>
        <div class="col" style="margin-top: 20px">
          <h2>Reproduz meme do Lula</h2>
        </div>
      </div>
      <br /><br /><br />
      <div class="row">
        <list title="Top 3 Mais Curtidas" :list="listSponsors" />
      </div>
      <div class="row">
        <list title="Top 3 Patrocinadores" :list="listVoutes" />
      </div>
    </div>
    <panel-picture name="Lula" image="lula.png" :qtyVotes="this.qtyFirst"/>
    <div class="col-md-1 duel">
      <img :src="img('x.png')" />
    </div>
    <panel-picture name="Bolsonaro" image="bolsonaro.png" :qtyVotes="this.qtySecond" />
  </div>
</template>

<style>
.duel {
  position: absolute;
  top: 40%;
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
  data() {
    return {
      listSponsors: [],
      qtyFirst: 0,
      qtySecond: 0,
      listVoutes: [],
      loading: true,
    };
  },
  created() {
    this.getMoviments();
  },
  methods: {
    getMoviments() {
       setInterval(() => {
        axios
          .get("http://localhost:8989/api/getMoviment", {
            params: { "filters[type]": 2,}
          })
          .then((response) => {
            this.listSponsors = response.data.sponsors != null ? response.data.sponsors : [];
            this.qtyFirst = response.data.firstCounter;
            this.qtySecond = response.data.secondCounter;
          })
          .catch(function (error) {
            console.log(error);
          });

        $('.container-list').animate({ scrollTop: $('.container-list').scrollHeight}, 500);
      }, 5000);
    },
  },
};
</script>
