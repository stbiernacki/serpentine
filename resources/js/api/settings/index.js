import request from '@/utils/request'
export function get() {
    return request({
        url: '/setting/get',
        method: 'get'
    })
}
