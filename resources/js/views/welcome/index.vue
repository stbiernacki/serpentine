<template>
    <div>
        <el-card>
            <el-row>
                <el-col :span="24">
                    <div>
                        <div style="margin-bottom: 10px">
                            <el-row>
                                <el-col :span="6">
                                    <el-input placeholder="search name" v-model="filters[0].value"></el-input>
                                </el-col>
                                <el-col class="serpentine-right" :span="6">
                                    <el-input placeholder="search gender" v-model="filters[1].value"></el-input>
                                </el-col>
                                <el-col :span="12">
                                    <span class="serpentine-list">List Of People From Star Wars</span>
                                </el-col>
                            </el-row>
                        </div>
                    </div>
                    <el-divider/>
                    <data-tables
                        :data="people"
                        :pagination-props="{ pageSizes: [5, 10, 15, 20] }"
                        :filters="filters"
                        :table-props="tableProps"
                    >
                        <el-table-column
                            v-for="(title, index) in titles"
                            :key="`people_${index}`"
                            :label="title.label"
                            :prop="title.prop"
                            :width="title.width"
                            sortable
                        >
                        </el-table-column>
                        <el-table-column label="Actions" width="150">
                            <template slot-scope="scope">
                                <el-tooltip placement="left"  effect="light" content="Share">
                                    <el-popover
                                        placement="top"
                                        width="250"
                                        trigger="click">
                                        <AppActionInfo />
                                        <el-button
                                            circle
                                            size="mini"
                                            icon="el-icon-share"
                                            type="success"
                                            slot="reference"
                                        >
                                        </el-button>
                                    </el-popover>
                                </el-tooltip>
                                <el-tooltip placement="top" effect="light" content="Edit">
                                    <el-popover
                                        placement="top"
                                        width="250"
                                        trigger="click">
                                        <AppActionInfo />
                                        <el-button
                                            circle
                                            size="mini"
                                            icon="el-icon-edit"
                                            type="primary"
                                            slot="reference"
                                        >
                                        </el-button>
                                    </el-popover>
                                </el-tooltip>
                                <el-tooltip placement="right" effect="light" content="Delete">
                                    <el-popover
                                        placement="top"
                                        width="250"
                                        trigger="click">
                                        <AppActionInfo />
                                        <el-button
                                            circle
                                            size="mini"
                                            icon="el-icon-delete"
                                            type="danger"
                                            slot="reference"
                                        >
                                        </el-button>
                                    </el-popover>
                                </el-tooltip>
                            </template>
                        </el-table-column>
                    </data-tables>
                </el-col>
            </el-row>
        </el-card>
    </div>

</template>

<script>
import AppActionInfo from '@/components/AppActionInfo/'

export default {
    name: "Welcome",
    components: {
        AppActionInfo
    },
    data() {
        return {
            show: {
                operation: false
            },
            titles: [
                {
                    label: 'Name',
                    prop: `name`,
                    width: 300
                },
                {
                    label: 'Height',
                    prop: 'height',
                },
                {
                    label: 'Mass',
                    prop: 'mass',
                },
                {
                    label: 'Hair Color',
                    prop: 'hair_color',
                },
                {
                    label: 'Skin Color',
                    prop: 'skin_color',
                },
                {
                    label: 'Eye Color',
                    prop: 'eye_color',
                },
                {
                    label: 'Birth Year',
                    prop: 'birth_year',
                },
                {
                    label: 'Gender',
                    prop: 'gender',
                },

            ],
            filters: [
                {
                    prop: 'name',
                    value: ''
                },
                {
                    prop: 'gender',
                    value: ''
                }
            ],
            tableProps: {
                stripe: true,
                size:"mini",
                "highlight-current-row": true,
                pageSize: 10,
            }
        }
    },
    computed: {
        people() {
            const people = this.$store.getters.people_star_wars.people
            const gender = this.filters[1].value
            if (gender === 'm' || gender === 'ma' || gender === 'mal' || gender === 'male') {
                return people.filter(person => person.gender === "male")
            }
            return people
        }
    },
}
</script>

<style scoped>
.serpentine-list {
    color: red;
    float: right;
    font-size: 1.2em;
    padding-right: 20px;
    font-weight: 700;
}
.serpentine-right {
    padding-left: 10px;
}
</style>
