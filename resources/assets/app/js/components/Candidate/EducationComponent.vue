<template>
    <div>
        <div class="row">
            <div class="col-xs-12" v-for="education in educations" v-if="educations.length > 0">
                <div class="item-block">
                    <div class="buttons-resume pull-right">
                        <a href="#" @click.prevent="edit(education.id)" class="btn btn-info btn-float btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" @click.prevent="remove(education.id)" class="btn btn-danger btn-float btn-xs">
                            <i class="fa fa-remove"></i>
                        </a>
                    </div>
                    <header>
                        <div class="hgroup">
                            <h4>{{education.degree}}
                                <small>{{education.major}}</small>
                            </h4>
                            <h5>{{education.institute}}</h5>
                        </div>
                        <h6 class="time">{{education.start}} - {{education.end}}</h6>
                    </header>
                    <div class="item-body">
                        <p>{{education.description}}</p>
                    </div>
                </div>
            </div>

            <div class="col-xs-12" v-if="educations.length === 0">
                <div class="alert alert-info text-center">Ainda não existem Formações Acadêmicas cadastradas!</div>
            </div>
        </div>

        <div class="col-xs-12" :class="visible ? 'block' : 'hide'">
            <div class="item-block">
                <div class="item-form">
                    <form @submit.prevent="save()">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" v-model="data.degree"
                                           name="degree" class="form-control" placeholder="Graduação, e.g. Bachelor">

                                </div>

                                <div class="form-group">
                                    <input type="text" v-model="data.major" name="major" class="form-control"
                                           placeholder="Curso, e.g. Ciências da computação">
                                </div>
                                <div class="form-group">
                                    <input type="text" v-model="data.institute" name="institute"
                                           class="form-control"
                                           placeholder="Nome do instituto, e.x. Fiap">
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Inicio</span>
                                        <input type="text" v-model="data.start" name="start"
                                               class="form-control" placeholder="ex. 2012">
                                        <span class="input-group-addon">Fim</span>
                                        <input type="text" v-model="data.end" name="end" class="form-control"
                                               placeholder="ex. 2016">
                                    </div>
                                </div>

                                <div class="form-group">
                                            <textarea class="form-control" v-model="data.description"
                                                      name="description" rows="3"
                                                      placeholder="Breve descrição"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <button class="btn btn-success" type="submit">Salvar</button>
                                <button type="button" class="btn btn-danger" @click="closeForm()">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-12 text-center">
            <br>
            <button class="btn btn-primary" @click="visible = true">Nova formação</button>
        </div>
    </div>
</template>

<script>
    import store from '../../store/store';
    import resumeMixin from '../../mixins/resume.mixin';
    import {error, afterSave} from '../../messages/error-and-after-save';
    export default {
        mixins: [resumeMixin],
        data() {
            return {
                visible: false,
                data: {
                    degree: '',
                    major: '',
                    institute: '',
                    start: '',
                    end: '',
                    description: ''
                },
                errors: []
            }
        },
        mounted() {
            store.dispatch('Education/getEducations');
        },
        computed: {
            educations() {
                return store.state.Education.educations;
            },
            getEducation(){
                return store.state.Education.education;
            }
        },
        methods: {
            save() {
                if (!this.data.id) {
                    store.dispatch('Education/storeEducation', this.data)
                        .then(() => {
                            store.dispatch('Education/getEducations');
                            this.visible = false;
                            this.clearData();
                        })
                        .then(afterSave, error)
                } else {
                    store.dispatch('Education/updateEducation', this.data).then(() => {
                        store.dispatch('Education/getEducations');
                        this.visible = false;
                        this.clearData();
                    })
                        .then(afterSave, error);
                }
            },
            edit(educationId) {
                this.clearData();
                store.dispatch('Education/getEducation', educationId)
                    .then(() => {
                        this.data = this.getEducation;
                        this.visible = true;
                    });

            },
            remove(educationId) {
                if (confirm("Deseja realmente remover esta formação acadêmica?")) {
                    store.dispatch('Education/deleteEducation', educationId);
                    new PNotify({
                        title: 'Informação',
                        text: 'Formação Acadêmica removida com sucesso!',
                        styling: 'brighttheme',
                        type: 'success'
                    });
                }

            }
        }

    }
</script>