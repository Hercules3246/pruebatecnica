<template>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario</div>

                    <div class="card-body">
                        <form @submit.prevent="keepData" >
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="td"
                                        >Tipo de documento
                                        <span class="text-danger"
                                            >*</span
                                        ></label
                                    >
                                    <b-form-select
                                        name="td"
                                        id="td"
                                        class="form-control"
                                        :class="{
                                            'is-invalid':
                                                form.errors.has(
                                                    'tipodocumento'
                                                ),
                                        }"
                                        :options="tipd"
                                        value-field="id"
                                        v-model="form.tipodocumento"
                                        text-field="tipodocumento"
                                    >
                                        <option value="" selected disabled>
                                            Por favor selecciona..
                                        </option>
                                    </b-form-select>
                                      <has-error
                                        :form="form"
                                        field="tipodocumento"
                                    ></has-error>
                                </div>
                            </div>
                            <br />
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="id"
                                        >Numero de documento
                                        <span class="text-danger"
                                            >*</span
                                        ></label
                                    >
                                    <input
                                        id="id"
                                        name="id"
                                        class="form-control"
                                        type="text"
                                        placeholder="ingresa el numero de documento"
                                        v-model="form.numeroid"
                                         v-on:keypress="isLetterOrNumber($event)"
                                        :class="{
                                            'is-invalid':
                                                form.errors.has('numeroid'),
                                        }"
                                    />
                                    <has-error
                                        :form="form"
                                        field="numeroid"
                                    ></has-error>
                                </div>
                            </div>
                            <br />
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="fn"
                                        >Primer nombre
                                        <span class="text-danger"
                                            >*</span
                                        ></label
                                    >
                                    <input
                                        id="fn"
                                        name="fn"
                                        class="form-control"
                                        type="text"
                                        placeholder="ingresa el primer nombre"
                                        v-model="form.firstname"
                                        @keypress="isLetter($event)"
                                        :class="{
                                            'is-invalid':
                                                form.errors.has('firstname'),
                                        }"
                                    />
                                    <has-error
                                        :form="form"
                                        field="firstname"
                                    ></has-error>
                                </div>
                            </div>
                            <br />
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="sn"
                                        >Segundo nombre
                                        <span class="text-danger"
                                            >*</span
                                        ></label
                                    >
                                    <input
                                        id="sn"
                                        name="sn"
                                        class="form-control"
                                        type="text"
                                        placeholder="ingresa el segundo nombre"
                                        @keypress="isLetter($event)"
                                        v-model="form.secondname"
                                        :class="{
                                            'is-invalid':
                                                form.errors.has('secondname'),
                                        }"
                                    />
                                    <has-error
                                        :form="form"
                                        field="secondname"
                                    ></has-error>
                                </div>
                            </div>
                            <br />
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="fl"
                                        >Primer apellido
                                        <span class="text-danger"
                                            >*</span
                                        ></label
                                    >
                                    <input
                                        id="fl"
                                        name="fl"
                                        class="form-control"
                                        type="text"
                                        placeholder="ingresa el primer apellido"
                                        v-model="form.firstlastname"
                                             @keypress="isLetter($event)"
                                        :class="{
                                            'is-invalid':
                                                form.errors.has(
                                                    'firstlastname'
                                                ),
                                        }"
                                    />
                                    <has-error
                                        :form="form"
                                        field="firstlastname"
                                    ></has-error>
                                </div>
                            </div>
                            <br />
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="sl"
                                        >Segundo apellido
                                        <span class="text-danger"
                                            >*</span
                                        ></label
                                    >
                                    <input
                                        id="sl"
                                        name="sl"
                                        class="form-control"
                                        type="text"
                                        placeholder="ingresa el segundo apellido"
                                        v-model="form.secondlastname"
                                             @keypress="isLetter($event)"
                                        :class="{
                                            'is-invalid':
                                                form.errors.has(
                                                    'secondlastname'
                                                ),
                                        }"
                                    />
                                    <has-error
                                        :form="form"
                                        field="secondlastname"
                                    ></has-error>
                                </div>
                            </div>
                            <br />
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="e"
                                        >Correo
                                        <span class="text-danger"
                                            >*</span
                                        ></label
                                    >
                                    <input
                                        id="e"
                                        name="e"
                                        class="form-control"
                                        type="email"
                                        placeholder="ingresa el correo electronico"
                                        v-model="form.email"
                                        :class="{
                                            'is-invalid':
                                                form.errors.has('email'),
                                        }"
                                    />
                                    <has-error
                                        :form="form"
                                        field="email"
                                    ></has-error>
                                </div>
                            </div>
                            <br />
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="pw"
                                        >Contraseña
                                        <span class="text-danger"
                                            >*</span
                                        ></label
                                    >
                                    <input
                                        id="pw"
                                        name="pw"
                                        class="form-control"
                                        type="password"
                                        placeholder="ingresa la contraseña"
                                        v-model="form.password"
                                        :class="{
                                            'is-invalid':
                                                form.errors.has('password'),
                                        }"
                                    />
                                    <has-error
                                        :form="form"
                                        field="password"
                                    ></has-error>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <button class="btn btn-success" type="submit">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: new Form({
                numeroid: "",
                firstname: "",
                secondname: "",
                firstlastname: "",
                secondlastname: "",
                email: "",
                password: "",
                tipodocumento: "",
            }),
            tipd: [],
        };
    },
    methods: {
       async keepData() {
            swal.fire({
                title: "¡ Por favor espera !",
                html: "Creando registro.....", //
                allowOutsideClick: "false",
                onBeforeOpen: () => {
                    swal.showLoading();
                },
                onAfterClose() {
                    swal.hideLoading();
                },
            });
           await this.form
            .post("/api/postUser")
                .then((response) => {
                    swal.close();
                    swal.fire({
                    icon: "success",
                    title: "¡Exito!",
                    text: response.data.message,
                    });
                    this.form.reset();
                })
                .catch(function (error) {
                    swal.close();
                    swal.fire({
                    icon: "error",
                    title: "¡Error!",
                    text: error.response.data.message,
                    });
                });
        },
        async getData() {
            await axios
                .get("/api/getData")
                .then((response) => {
                    this.tipd = response.data.tipodocs;
                })
                .catch(() => {
                    console.log("Error trayendo data");
                });
        },
            isLetterOrNumber(e) {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-z0-9]+$/.test(char)) return true;
      else e.preventDefault();
    },
    isLetter(e) {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/g.test(char)) return true;
      else e.preventDefault();
    },
    },
    created() {
        this.getData();
    },
};
</script>
<style>
#fn {
  text-transform: uppercase !important;
}
#sn {
  text-transform: uppercase !important;
}
#fl {
  text-transform: uppercase !important;
}
#sl {
  text-transform: uppercase !important;
}
#e {
  text-transform: uppercase !important;
}
#id {
  text-transform: uppercase !important;
}
</style>