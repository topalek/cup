<template>
  <section class="solution-catalog" id="solution-catalog">
    <div class="container">
      <h2>Состав готового решения</h2>
      <div class="solution-catalog__tabs">
        <div
          class="solution-catalog__tab"
          @click="changeProducts(i)"
          v-for="(item, i) in products"
          :key="i"
          :class="{ active: item.isActiveTab }">
          {{item.tab}}
        </div>
      </div>
      <div class="solution-catalog__wrap">
        <div class="solution-catalog__list">
          <div
            class="solution-catalog__product"
            v-for="(item, i) in currentProduct.info"
            :key="i"
            :class="{ active: item.isActiveProduct }"
            @click="changeDish(i)"
          >
            <div class="solution-catalog__product-title">
              {{item.title}}
            </div>
            <div class="solution-catalog__product-icons">
              <div
                class="solution-catalog__product-icon solution-catalog__product-icon--replace"
                >
                <svg
                  width="23"
                  height="23"
                  viewBox="0 0 23 23"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>
              <div
                @click="deleteZap(item.id)"
                class="solution-catalog__product-icon solution-catalog__product-icon--delete"
                >
                <svg
                  width="17"
                  height="21"
                  viewBox="0 0 17 21"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z"
                  />
                </svg>
              </div>
            </div>
          </div>
          <a href="javascript:void(0);" class="solution-catalog__add"
            >Добавить</a
          >
        </div>
        <div class="solution-catalog__info">
          <div class="solution-catalog__image">
            <img :src="currentDish.image" alt="" />
          </div>
          <div class="solution-catalog__compound">
            <div class="solution-catalog__compound-title">Состав:</div>
            <div class="solution-catalog__compound-text" v-html="currentDish.compound">
            </div>
          </div>
          <div @click="SendDataPage()" class="solution-catalog__card">в корзину</div>
        </div>
      </div>
    </div>
    <div class="modal modal--replace">
      <div class="modal__wrap">
        <div class="modal__title">Заменить</div>
        <div class="modal__close">
          <svg
            width="31"
            height="31"
            viewBox="0 0 31 31"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M27.4246 30.0878L15.4996 18.1441L3.57461 30.0878L0.912109 27.4253L12.8559 15.5003L0.912109 3.57534L3.57461 0.912842L15.4996 12.8566L27.4246 0.931592L30.0684 3.57534L18.1434 15.5003L30.0684 27.4253L27.4246 30.0878Z"
              fill="#E0E0E0"
            />
          </svg>
        </div>
        <div class="modal__product">
          1. Ролл из опалённого на ольхе лосося с пряным сыром
        </div>
        <div class="modal__items">
          <div class="modal__item">
            <input type="radio" id="product1" name="product" />
            <label for="product1">
              <div class="modal__item-image">
                <img src="/assets/img/modal-replace-image.jpg" alt="" />
              </div>
              <div class="modal__item-wrap">
                <div class="modal__item-text">
                  Деликатес в мини-баночке с креветкой и персиком
                </div>
              </div>
            </label>
          </div>
          <div class="modal__item">
            <input type="radio" id="product2" name="product" />
            <label for="product2">
              <div class="modal__item-image">
                <img src="/assets/img/modal-replace-image.jpg" alt="" />
              </div>
              <div class="modal__item-wrap">
                <div class="modal__item-text">
                  Деликатес в мини-баночке с креветкой и персиком
                </div>
              </div>
            </label>
          </div>
          <div class="modal__item">
            <input type="radio" id="product3" name="product" />
            <label for="product3">
              <div class="modal__item-image">
                <img src="/assets/img/modal-replace-image.jpg" alt="" />
              </div>
              <div class="modal__item-wrap">
                <div class="modal__item-text">
                  Деликатес в мини-баночке с креветкой и персиком
                </div>
              </div>
            </label>
          </div>
          <div class="modal__item">
            <input type="radio" id="product4" name="product" />
            <label for="product4">
              <div class="modal__item-image">
                <img src="/assets/img/modal-replace-image.jpg" alt="" />
              </div>
              <div class="modal__item-wrap">
                <div class="modal__item-text">
                  Деликатес в мини-баночке с креветкой и персиком
                </div>
              </div>
            </label>
          </div>
          <div class="modal__item">
            <input type="radio" id="product5" name="product" />
            <label for="product5">
              <div class="modal__item-image">
                <img src="/assets/img/modal-replace-image.jpg" alt="" />
              </div>
              <div class="modal__item-wrap">
                <div class="modal__item-text">
                  Деликатес в мини-баночке с креветкой и персиком
                </div>
              </div>
            </label>
          </div>
          <div class="modal__item modal__item--another">
            <input type="radio" id="another_product" name="product" />
            <label for="another_product">
              <div class="modal__item-wrap">
                <div class="modal__item-title">Другое блюдо</div>
                <div class="modal__item-text">
                  Отметьте этот пункт, если вы не смогли выбрать из предложенных
                  вариантов.
                </div>
              </div>
            </label>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
export default {
  data: () => ({
    Pages:null,
    currentProduct: {},
    currentDish: {},
    products: [],
  }),
  methods: {
    /* ВЫБОРКА ИНФОРМАЦИИ ПО СТРАНИЦЕ ИЗ API */
    loadDataPage(url){
        axios.get('/api/menuprod/'+url)
        .then(res=>{
          this.Pages=res.data;
          let datamas=this.Pages
          let datamas2=this.Pages
          let fl=true
          for (let i2 in datamas.spprod){
            this.products.push({ 
              id: datamas.spprod[i2].id,
              tab: datamas.spprod[i2].tab,
              isActiveTab: datamas.spprod[i2].isActiveTab,
              info: datamas.spprod[i2].info
            })
          }
          if(fl){
            this.currentProduct={
              info:datamas2.spprod[0].info,
            }
            this.currentDish={
              id:datamas2.spprod[0].info[0].id,
              title:datamas2.spprod[0].info[0].title,
              image:datamas2.spprod[0].info[0].image,
              compound:datamas2.spprod[0].info[0].compound
            }
            fl=false
          }
        })
    },
    changeProducts(i) {
      for (let j = 0; j < this.products.length; j++) {
        this.products[j].isActiveTab = false;
      }
      this.currentProduct = this.products[i];
      this.products[i].isActiveTab = true;
    },
    changeDish(i) {
      this.currentProduct.info[0].isActiveProduct = false;
      this.currentDish.isActiveProduct = false;
      this.currentDish = this.currentProduct.info[i];
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
        let productsvr=[];
        let permas=0;
        for (let j = 0; j < this.products.length; j++) {
          let productsvr2=this.products[j].info;
          for (let j2 = 0; j2 < productsvr2.length; j2++) {
            productsvr[permas] = productsvr2[j2].id;
            permas++;
          }
        }
        productsvr.forEach(function(value) {
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

    deleteZap(id){
      for (let j = 0; j < this.currentProduct.info.length; j++) {
          if(this.currentProduct.info[j].id==id){
            this.currentProduct.info.splice(j, 1);
          }
      };
      for (let j = 0; j < this.products.length; j++) {
          let productsvr2=this.products[j].info;
          for (let j2 = 0; j2 < productsvr2.length; j2++) {
            if(productsvr2[j2].id==id){
              productsvr2.splice(j2, 1);
            }
          }
          this.products[j].info=productsvr2;
      }
    },
  },
  mounted() {
    var segment_str = window.location.href;
    var segment_array = segment_str.split( '/' );
    var last_segment = segment_array.pop();
    this.loadDataPage(last_segment);
  },
};
</script>