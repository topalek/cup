<template>
  <section id="solution-catalog" class="solution-catalog">
    <div class="container">
      <h2>Состав готового решения</h2>
      <div class="solution-catalog__tabs">
        <div
            v-for="(item, i) in products"
            :key="i"
            :class="{ active: item.isActiveTab }"
            class="solution-catalog__tab"
            @click="changeProducts(i)">
          {{ item.tab }}
        </div>
      </div>
      <div class="solution-catalog__wrap">
        <div class="solution-catalog__list">
          <solution-item v-for="item in currentProduct.info"
                         :key="item.id"
                         :class="{ active: item.isActiveProduct }"
                         :item="item"
                         @deleteItem="deleteZap(item.id)" @openModal="openModal(item.id)"/>
          <a class="solution-catalog__add" href="javascript:void(0);" @click="openAddModal"
          >Добавить</a
          >
        </div>
        <div class="solution-catalog__info">
          <div class="solution-catalog__image">
            <img :src="img(currentDish.image)" alt="555"/>
          </div>
          <div class="solution-catalog__compound">
            <div class="solution-catalog__compound-title">Состав:</div>
            <div class="solution-catalog__compound-text" v-html="currentDish.compound">
            </div>
          </div>
          <div class="solution-catalog__card" @click="SendDataPage">в корзину</div>
        </div>
      </div>
    </div>
    <modal-replace
        v-if="showModal"
        :class="{'modal--active':showModal}"
        :product="modalData"
        @closeModal="closeModal"
        @replaceItem="changeDish"
    />
    <modal-add
        v-if="showAddModal"
        :class="{'modal--active':showAddModal}"
        @closeAddModal="closeAddModal"
    />
  </section>
</template>

<script>
import axios from "axios";
import solutionItem from "./components/solutionItem";
import modalReplace from "./components/modalReplace";
import ModalAdd from "./components/modalAdd";

export default {
  components: {
    ModalAdd,
    solutionItem,
    modalReplace
  },
  data: () => ({
    Pages: null,
    currentProduct: {},
    currentDish: {},
    products: [],
    product: {},
    showModal: false,
    showAddModal: false,
  }),
  methods: {
    /* ВЫБОРКА ИНФОРМАЦИИ ПО СТРАНИЦЕ ИЗ API */
    loadDataPage(url) {
      axios.get('/api/menuprod/' + url)
          .then(res => {
            this.Pages = res.data;
            let datamas = this.Pages
            let datamas2 = this.Pages
            let fl = true
            for (let i2 in datamas.spprod) {
              this.products.push({
                id: datamas.spprod[i2].id,
                tab: datamas.spprod[i2].tab,
                isActiveTab: datamas.spprod[i2].isActiveTab,
                info: datamas.spprod[i2].info
              })
            }
            if (fl) {
              this.currentProduct = {
                info: datamas2.spprod[0].info,
              }
              this.currentDish = {
                id: datamas2.spprod[0].info[0].id,
                title: datamas2.spprod[0].info[0].title,
                image: datamas2.spprod[0].info[0].image,
                compound: datamas2.spprod[0].info[0].compound
              }
              fl = false
            }
          })
    },
    openModal(id) {
      axios.get('/api/replace-product/' + id).then(resp => {
        if (resp.data.status) {
          this.product = resp.data.product
          this.showModal = true
        }

      })
    },
    closeModal() {
      this.showModal = false
    },
    closeAddModal() {
      this.showAddModal = false
    },
    openAddModal() {
      this.showAddModal = true
    },
    changeProducts(i) {
      for (let j = 0; j < this.products.length; j++) {
        this.products[j].isActiveTab = false;
      }
      this.currentProduct = this.products[i];
      this.products[i].isActiveTab = true;
    },
    changeDish(id) {
      this.currentProduct.info[0].isActiveProduct = false;
      this.currentDish.isActiveProduct = false;
      this.currentDish = this.currentProduct.info[id];
      this.currentDish.isActiveProduct = true;
      console.log(this.currentDish.isActiveProduct);
    },

    SendDataPage() {
      let existingObj = this;
      const config = {
        headers: {
          'content-type': 'multipart/form-data'
        }
      }
      /*Формирование массива для передачи*/
      let formData = new FormData();
      let productsvr = [];
      let permas = 0;
      for (let j = 0; j < this.products.length; j++) {
        let productsvr2 = this.products[j].info;
        for (let j2 = 0; j2 < productsvr2.length; j2++) {
          productsvr[permas] = productsvr2[j2].id;
          permas++;
        }
      }
      productsvr.forEach(function (value) {
        formData.append("productsvr[]", value)
      })

      axios.post('/addToCartGot', formData, config)
          .then(function (res) {
            existingObj.output2 = res.data.output;
          })
          .catch(function (err) {
            existingObj.output2 = 'Ошибка заполнение формы';
          });
    },

    deleteZap(id) {
      for (let j = 0; j < this.currentProduct.info.length; j++) {
        if (this.currentProduct.info[j].id == id) {
          this.currentProduct.info.splice(j, 1)
        }
      }
      for (let j = 0; j < this.products.length; j++) {
        let productsvr2 = this.products[j].info
        for (let j2 = 0; j2 < productsvr2.length; j2++) {
          if (productsvr2[j2].id == id) {
            productsvr2.splice(j2, 1)
          }
        }
        this.products[j].info = productsvr2
      }
    },
    img(str) {
      console.log(str)
      if (!str) {
        return str
      }
      str = str.split('//')
      if (str.length == 3) {
        str = "/" + str[2]
      }
      if (str.length == 2) {
        str = "/" + str[1]
      }
      return str
    }
  },
  computed: {
    modalData() {
      return this.product
    }
  },
  mounted() {
    var segment_str = window.location.href;
    var segment_array = segment_str.split('/');
    var last_segment = segment_array.pop();
    this.loadDataPage(last_segment);
  },
};
</script>
