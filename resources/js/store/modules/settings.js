import { get } from "@/api/settings/";

const state = {
    app: {
        people: []
    }
}

const mutations = {
    SET_APP_SETTINGS: (state, data) => {
        state.app.people = data;
    },
}

const actions = {
    getAppSettings: ({commit}) => {

        return new Promise((resolve, reject) => {
            get().then(response => {
                commit('SET_APP_SETTINGS', response.data)
                resolve();
            }).catch(e => {
                reject(e);
            })
        })
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    actions
}

