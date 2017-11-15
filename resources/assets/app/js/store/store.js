import Vuex from 'vuex';
import Education from './candidate/education';
import WorkExperience from './candidate/workExperience';
import Skill from './candidate/skill';

export default new Vuex.Store({
    modules: {
        Education,
        WorkExperience,
        Skill
    }
})