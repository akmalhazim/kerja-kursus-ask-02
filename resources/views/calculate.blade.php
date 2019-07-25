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
    <body>
        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div> -->


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
                          <p>Anda layak menerima <strong>@{{ result.totalComissionPecentage }}%</strong> per penapis air</p>
                          <hr>
                          <p class="mb-0">Jumlah unit terjual secara kesuluruhan: <strong>@{{ result.totalUnitsSold }}</strong></p>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        Isi maklumat di bawah
                      </div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                          <div class="form-group">
                            <label for="jan">Unit Terjual Bagi Bulan: <strong>January</strong></label>
                            <input type="number" class="form-control" id="jan" placeholder="0" v-model="form.jan">
                          </div>
                          <div class="form-group">
                            <label for="feb">Unit Terjual Bagi Bulan: <strong>February</strong></label>
                            <input type="number" class="form-control" id="feb" placeholder="0" v-model="form.feb">
                          </div>
                          <div class="form-group">
                            <label for="mac">Unit Terjual Bagi Bulan: <strong>March</strong></label>
                            <input type="number" class="form-control" id="mac" placeholder="0" v-model="form.mac">
                          </div>
                          <div class="form-group">
                            <label for="apr">Unit Terjual Bagi Bulan: <strong>April</strong></label>
                            <input type="number" class="form-control" id="apr" placeholder="0" v-model="form.apr">
                          </div>
                          <div class="form-group">
                            <label for="may">Unit Terjual Bagi Bulan: <strong>May</strong></label>
                            <input type="number" class="form-control" id="may" placeholder="0" v-model="form.may">
                          </div>
                          <div class="form-group">
                            <label for="jun">Unit Terjual Bagi Bulan: <strong>Jun</strong></label>
                            <input type="number" class="form-control" id="jun" placeholder="0" v-model="form.jun">
                          </div>
                          <div class="form-group">
                            <label for="jul">Unit Terjual Bagi Bulan: <strong>July</strong></label>
                            <input type="number" class="form-control" id="jul" placeholder="0" v-model="form.jul">
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
                        form: {
                            jan: 0,
                            feb: 0,
                            mac: 0,
                            apr: 0,
                            may: 0,
                            jun: 0,
                            jul: 0
                        },
                        result: null
                    }
                },
                methods: {
                    async submit() {
                        try {
                            _result = await axios.post('/api/calculate', this.form)
                            this.result = _result.data

                        } catch(err) {
                            this.result = null
                            console.error(err)
                        }
                    }
                }
            }).$mount('#app')
        </script>
    </body>
</html>
