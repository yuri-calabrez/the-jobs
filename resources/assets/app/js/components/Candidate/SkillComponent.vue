<template>
    <div class="row">
        <div class="col-xs-12" v-if="skills.length > 0" v-for="skill in skills" :id="'skill-'+skill.id">
            <div class="item-block">
                <div class="item-form">
                    <form @submit.prevent="update(skill)">
                        <button class="btn btn-danger btn-float btn-remove" @click="remove(skill.id)">
                            <i class="ti-close"></i>
                        </button>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="name" v-model="skill.name"  required
                                           class="form-control" placeholder="Nome, e.g. HTML">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="number" required maxlength="3"
                                               v-model="skill.percentage"
                                               name="percentage" class="form-control"
                                               placeholder="Proficiência, e.g. 90">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xs-12" v-if="skills.length === 0">
            <div class="alert alert-info text-center">
                Ola! Você ainda não possui nenhuma skill cadastrada. Comece agora mesmo!
            </div>
        </div>

        <hr>
        <form @submit.prevent="store()">
            <div class="col-xs-12">
                <div class="item-block">
                    <div class="item-form">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" v-model="data.name" required class="form-control"
                                           placeholder="Nome, e.g. HTML">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="number" maxlength="3" v-model="data.percentage" required
                                               class="form-control"
                                               placeholder="Proficiência, e.g. 90">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xs-12 text-center">
                <br>
                <button class="btn btn-primary" type="submit">Adicionar skill</button>
            </div>
        </form>
    </div>
</template>

<script>
    import store from '../../store/store';
    import {error, afterSave} from '../../messages/error-and-after-save';

    export default {
        data() {
            return {
                data: {
                    name: '',
                    percentage: ''
                }
            }
        },
        mounted() {
            store.dispatch('Skill/getSkills');
        },
        computed: {
            skills() {
                return store.state.Skill.skills;
            }
        },
        methods: {
            store() {
                store.dispatch('Skill/storeSkill', this.data).then(() => {
                    store.dispatch('Skill/getSkills');
                    this.data = {};
                })
                    .then(afterSave, error);
            },
            update(skill) {
                let data = {
                    name: skill.name,
                    percentage: skill.percentage
                };
                store.dispatch('Skill/updateSkill', {data: data, id: skill.id})
                    .then(afterSave, error);
            },
            remove(id) {
                store.dispatch('Skill/removeSkill', id).then(() => {
                    $('#skill-' + id).fadeOut();
                    new PNotify({
                        title: 'Informação',
                        text: 'Skill removida com sucesso!',
                        styling: 'brighttheme',
                        type: 'success'
                    });
                });
            }
        }
    }
</script>