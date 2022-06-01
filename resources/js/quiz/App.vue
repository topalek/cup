 <template>
      <section class="quiz" id="quiz">
        <div class="container">
          <h2>Рассчитать стоимость мероприятия</h2>
          <form @submit="formSubmit" enctype="multipart/form-data" class="quiz__wrap">
            
            <div class="quiz__image">
              <img :src="quizImage" alt="" />
            </div>
            <div class="quiz__info">
              <div class="quiz__info-top">
                <div class="quiz__info-title">{{title}}</div>
                <div class="quiz__info-steps">
                  <span>0{{current}}</span>/0{{total}}
                </div>
              </div>
              {{output}}
              <div
                class="quiz__item quiz__item--price"
                :class="current === 1 ? 'active' : ''"
              >
                <div class="quiz__price" v-for="(item, i) in prices" :key="i">
                  <input type="radio" :id="item.id" name="price" />
                  <label :for="item.for">{{item.title}}</label>
                </div>
              </div>
              <div class="quiz__item" :class="current === 2 ? 'active' : ''">
                <div class="quiz__item-group">
                  <input type="text" class="test" id="adults_count" v-model="adults"/>
                  <label for="adults_count">взрослые</label>
                </div>
                <div class="quiz__item-group">
                  <input type="text" id="child_count" v-model="kids"/>
                  <label for="child_count">Дети</label>
                </div>
                <div class="quiz__item-group">
                  <input type="date" id="date" v-model="datebegin"/>
                  <label for="date">дата проведения</label>
                </div>
              </div>
              <div class="quiz__item" :class="current === 3 ? 'active' : ''">
                <div class="quiz__item-total">{{priceTotal}} рублей</div>
                <div class="quiz__item-notation">
                  Стоимость рассчитывается примерно, уточняется при расчёте
                  коммерческого предложения в зависимости от меню и
                  ассортимента.
                </div>
              </div>
              <div class="quiz__item" :class="current === 4 ? 'active' : ''">
                <div class="quiz__item-group">
                  <the-mask
                    mask="+7 (XXX) XXX-XX-XX"
                    :masked="true"
                    :tokens="phoneRegular"
                    type="text"
                    id="phone"
                    required
                    placeholder="+7 (___) ___-__-__"
                    v-model="phone"
                  />
                  <label for="phone">Телефон</label>
                </div>
                <div class="quiz__item-group">
                  <input required type="text" id="name" v-model="name"/>
                  <label for="name">Имя</label>
                </div>
              </div>
              <div
                class="events__link events__link--quiz"
                v-if="sendResults === false">
                <a
                  class="events__link-item link--arrow-brown"
                  @click="changeQuiz(1)"
                  href="javascript:void(0)"
                  >Далее</a
                >
              </div>
              <div class="events__link events__link--quiz" v-if="sendResults">
                <button
                  class="events__link-item link--arrow-brown"
                  @click="changeQuiz(1)">
                  Отправить
                </button>
              </div>
            </div>
          </form>
        </div>
      </section>
</template>

<script>
import axios from "axios";
export default {
//el: "#quizelem",
  data: () => ({
    title: "Формат мероприятия:",
    current: 1,
    output: null,
    Revs: null,
    adults: '',
    kids: '',
    datebegin: '',
    phone: null,
    name: null,
    valueCheckPrice2: null,
    total: 4,
    phoneRegular: {
      X: {
        pattern: /\d/,
      },
    },
    sendResults: false,
    priceTotal: 0,
    quizImage: "/assets/img/quiz-image.jpg",
    prices: [],
  }),
  methods: {
    formSubmit(e) {
        e.preventDefault();
        this.output=null;
        let existingObj = this;
        const config = {
          headers: {
            'content-type': 'multipart/form-data'
          }
        }

        let data = new FormData();
        data.append('user', this.name);
        data.append('phone', this.phone);

        data.append('titlemer', this.valueCheckPrice2);
        data.append('datebegin', this.datebegin);
        data.append('adults', this.adults);
        data.append('kids', this.kids);
        data.append('price', this.priceTotal);

        axios.post('/sendEmail', data, config)
        .then(function (res) {
          existingObj.output = res.data.output;
        })
        .catch(function (err) {
          existingObj.output = 'Ошибка заполнение формы';
        });
    },
    /* ВЫБОРКА ИНФОРМАЦИИ ПО QUIZ ИЗ API */
    loadDataStaff(){
      axios.get('/api/apiquiz')
      .then(res=>{
        this.Revs=res.data;
        let datamas=this.Revs;

        for (let i in datamas.quiz){
          this.prices.push({
            title: datamas.quiz[i].title,
            id: datamas.quiz[i].name,
            for: datamas.quiz[i].name,
            price: datamas.quiz[i].price
          });
        }
      })
    },

    changeQuiz(direction) {
      switch (direction) {
        case 1:
          if (this.current != this.total) this.current += direction;
          // else this.showResult = true;
          break;
      }
      switch (this.current) {
        case 1: {
          this.title = "Формат мероприятия:";
          this.quizImage = "/assets/img/quiz-image.jpg";
          break;
        }
        case 2: {
          this.title = "Количество гостей:";
          this.quizImage = "/assets/img/quiz-image-2.jpg";
          break;
        }
        case 3: {
          this.title = "Детальный просчет:";
          this.quizImage = "/assets/img/quiz-image-3.jpg";
          this.calc();
          break;
        }
        case 4: {
          this.title = "Контактные данные:";
          this.quizImage = "/assets/img/quiz-image-4.jpg";
          this.sendResults = true;
          break;
        }
      }
    },
    calc() {
      this.valueCheckPrice2 = null;
      let checkPrice = document.getElementsByName("price");
      let valueCheckPrice;
      let price;
      let valueAdultInput = +document.querySelector("#adults_count").value;
      let valueChildInput = +document.querySelector("#child_count").value;
      for (let i = 0; i < checkPrice.length; i++) {
        if (checkPrice[i].type == "radio" && checkPrice[i].checked) {
          valueCheckPrice = checkPrice[i].id;
          this.valueCheckPrice2 = this.prices[i].title; 
        }
      }
      for (let i = 0; i < this.prices.length; i++) {
        if (this.prices[i].id == valueCheckPrice) {
          price = this.prices[i].price;
        }
      }
      if (valueCheckPrice == "tar_tar") {
        this.priceTotal = (valueAdultInput + valueChildInput) * price + 15000;
      }else{
        if (valueCheckPrice == "children_holiday") {
          this.priceTotal = (valueAdultInput + valueChildInput) * price + 500 * valueChildInput;
        }else{
          this.priceTotal = (valueAdultInput + valueChildInput) * price;
        }
      }
    },
  },
  created() {
    this.loadDataStaff();
  },

};
</script>