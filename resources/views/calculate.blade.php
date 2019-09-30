<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Akmal Hazim | Calculate</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        
    </head>
        <div class="container" id="app">
            <blockquote class="blockquote text-center">
              <h1 class="mb-0" style="margin-top: 20px;">Pengira jumlah comission bagi ejen penapis air</h1>
              <footer class="blockquote-footer mb-8">Coway <cite title="Source Title">berbangga</cite> dengan kehadiran anda</footer>
            </blockquote>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="alert alert-success" style="margin-bottom: 2rem;" role="alert" v-if="result != null">
                          <h4 class="alert-heading">Tahniah!</h4>
                          <p>Jumlah commision anda adalah sebanyak: <strong>RM@{{ result.totalComission }}</strong></p><br/>
                          <p class="mb-0">Jumlah unit terjual secara kesuluruhan: <strong>@{{ result.totalUnitsSold }}</strong></p>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        Isi maklumat di bawah
                      </div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                          <div class="form-group mb-4">
                            <label for="price"><strong>Harga</strong> satu penapis air adalah: <strong>RM</strong></label>
                            <input type="number" id="price" class="form-control" placeholder="2500" v-model="price">
                          </div>

                          <div class="form-group mb-4" v-for="(item, index) in form" :key="item.id">
                            <label :for="item.name">Unit Terjual Bagi Bulan: <strong>@{{ item.month }}</strong></label>
                            <input type="number" class="form-control" :id="item.name" placeholder="0" v-model="item.value">
                            
                            <div class="alert mt-2" :class="getAlertClass(result.calculated[index].type)" role="alert" v-if="result">
                              Komision untuk bulan <strong>@{{ item.month }}</strong> ialah <strong>RM@{{ result.calculated[index].comission }}</strong>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-primary btn-block mb-2">Calculate</button>
                        </form>
                    </div>

                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script>
            new Vue({
                data: function() {
                    return {
                        price: 2500,
                        form: [
                            {
                              month: 'Januari',
                              value: 0
                            },
                            {
                              month: 'Februari',
                              value: 0
                            },
                            {
                              month: 'Mac',
                              value: 0
                            },
                            {
                              month: 'April',
                              value: 0
                            },
                            {
                              month: 'Mei',
                              value: 0
                            },
                            {
                              month: 'Jun',
                              value: 0
                            },
                            {
                              month: 'Julai',
                              value: 0
                            },
                            {
                              month: 'Ogos',
                              value: 0
                            },
                            {
                              month: 'September',
                              value: 0
                            },
                            {
                              month: 'Oktober',
                              value: 0
                            },
                            {
                              month: 'November',
                              value: 0
                            },
                            {
                              month: 'Disember',
                              value: 0
                            }
                        ],
                        result: null
                    }
                },
                methods: {
                    async submit() {
                        try {
                            _result = await axios.post('/api/calculate', {
                              months: this.form,
                              price: this.price
                            })
                            this.result = _result.data

                        } catch(err) {
                            this.result = null
                            console.error(err)
                        }
                    },

                    getAlertClass(type) {
                      return `alert-${type}`;
                    }
                }
            }).$mount('#app')
        </script>
    </body>
</html>
