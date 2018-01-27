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
                                <div class="form-group" :class="errors.has('degree') ? 'has-error' : ''">
                                    <input v-validate="'required'" type="text" name="degree" v-model="data.degree"
                                           class="form-control" placeholder="Graduação" required>
                                    <span v-show="errors.has('degree')" class="help-block">
                                            <p class="text-danger">{{ errors.first('degree') }}</p>
                                        </span>
                                </div>
                                <div class="form-group" :class="errors.has('major') ? 'has-error' : ''">
                                    <input v-validate="'required'" type="text" v-model="data.major"
                                           class="form-control" name="major"
                                           placeholder="Curso, e.g. Ciências da computação">
                                    <span v-if="errors.has('major')" class="help-block">
                                        <p class="text-danger">{{ errors.first('major') }}</p>
                                    </span>
                                </div>
                                <div class="form-group" :class="errors.has('institute') ? 'has-error' : ''">
                                    <input v-validate="'required'" type="text" v-model="data.institute" name="institute"
                                           class="form-control"
                                           placeholder="Nome do instituto, e.x. Fiap">
                                    <span v-if="errors.has('institute')" class="help-block">
                                        <p class="text-danger">{{ errors.first('institute') }}</p>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Inicio</span>
                                        <div class="resume-date-container" :class="errors.has('start') ? 'has-error' : ''">
                                            <input v-validate="'required|numeric'" type="text" name="start"
                                                   v-model="data.start"
                                                   class="form-control" placeholder="e.g. 2012" required>
                                            <small v-if="errors.has('start')" class="text-danger message-date-absolute">
                                                {{ errors.first('start') }}
                                            </small>
                                        </div>

                                        <span class="input-group-addon">Fim</span>
                                        <div class="resume-date-container" :class="errors.has('end') ? 'has-error' : ''">
                                            <input v-validate="'required|numeric'" type="text"
                                                   name="end" v-model="data.end"
                                                   class="form-control" placeholder="e.g. 2012" required>
                                            <small class="text-danger message-date-absolute"></small>
                                            <small v-if="errors.has('end')" class="text-danger message-date-absolute">
                                                {{ errors.first('end') }}
                                            </small>
                                        </div>
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
                }
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