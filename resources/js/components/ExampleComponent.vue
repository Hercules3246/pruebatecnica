<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario</div>

                    <div class="card-body">
                        <form  @submit.prevent="keepData">
                            <div class="form-row">
                                <div class="form-col">
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="ingresa el primer nombre"
                                    
                                    />
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-col">
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="ingresa el segundo nombre"
                                    
                                    />
                                </div>
                            </div>
                             <br>
                            <div class="form-row">
                                <div class="form-col">
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="ingresa el primer apellido"
                                        
                                    />
                                </div>
                            </div>
                             <br>
                            <div class="form-row">
                                <div class="form-col">
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="ingresa el segundo apellido"
                                       
                                    />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col">
                                    <button class="btn btn-success">Guardar</button>
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
    
    }
     },
       methods: {
        keepData(){
            console.log("presionado......!");
        }
       },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
