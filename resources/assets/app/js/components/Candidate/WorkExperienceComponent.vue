<template>
    <div>
        <div class="row">
            <div class="col-xs-12" v-if="workExperiences.length > 0" v-for="wx in workExperiences">
                <div class="item-block">
                    <div class="buttons-resume pull-right">
                        <a href="#" @click.prevent="edit(wx.id)" class="btn btn-info btn-float btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" @click.prevent="remove(wx.id)" class="btn btn-danger btn-float btn-xs">
                            <i class="fa fa-remove"></i>
                        </a>
                    </div>
                    <header>
                        <div class="hgroup">
                            <h4>{{wx.company_name}}</h4>
                            <h5>{{wx.position}}</h5>
                        </div>
                        <h6 class="time">{{wx.start}} - {{wx.end !== null ? wx.end : 'Atualmente'}}</h6>
                    </header>
                    <div class="item-body">
                        <p>Responsabilidades:</p>
                        {{wx.job_description}}
                    </div>
                </div>
            </div>

            <div class="col-xs-12" v-if="workExperiences.length === 0">
                <div class="alert alert-info text-center">Ainda não existem Trabalhos cadastrados!</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12" :class="visible ? 'block' : 'hide'">
                <div class="item-block">
                    <div class="item-form">
                        <form @submit.prevent="save()">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="company_name" v-model="data.company_name"
                                               class="form-control" placeholder="Nome" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="position" v-model="data.position"
                                               placeholder="Cargo, e.g. UI/UX " required>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Date from</span>
                                            <input type="text" name="start" v-model="data.start"
                                                   class="form-control" placeholder="e.g. 2012" required>
                                            <span class="input-group-addon">Date to</span>
                                            <input type="text" name="end" v-model="data.end"
                                                   class="form-control" placeholder="e.g. 2016">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <textarea name="job_descripion" v-model="data.job_description"
                                              class="summernote-editor"></textarea>
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
                <button class="btn btn-primary" @click="visible = true">Add experience</button>
            </div>
        </div>
    </div>
</template>

<script>
    import store from '../../store/store';
    import resumeMixin from '../../mixins/resume.mixin';

    export default {
        mixins: [resumeMixin],
        data() {
            return {
                visible: false,
                data: {
                    company_name: '',
                    position: '',
                    start: '',
                    end: '',
                    job_description: ''
                }
            }
        },
        computed: {
            workExperiences() {
                return store.state.WorkExperience.workExperiences;
            },
            workExperience() {
                return store.state.WorkExperience.workExperience;
            }
        },
        mounted() {
            store.dispatch('WorkExperience/getWorkExperiences');
        },
        methods: {
            save() {
                if (!this.data.id) {
                    store.dispatch('WorkExperience/storeWorkExperience', this.data)
                        .then(() => {
                            store.dispatch('WorkExperience/getWorkExperiences');
                            this.visible = false;
                            this.clearData();
                        })
                } else {
                    store.dispatch('WorkExperience/updateWorkExperience', this.data).then(() => {
                        store.dispatch('WorkExperience/getWorkExperiences');
                        this.visible = false;
                        this.clearData();
                    })
                }
            },
            edit(workExperienceId) {
                this.clearData();
                store.dispatch('WorkExperience/getWorkExperience', workExperienceId)
                    .then(() => {
                        this.data = this.workExperience;
                        this.visible = true;
                    });

            },
            remove(workExperienceId) {
                if(confirm("Deseja realmente remover essa Experiencia?")) {
                    store.dispatch('WorkExperience/deleteWorkExperience', workExperienceId);
                }
            }
        }
    }
</script>