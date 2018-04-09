new Vue({
    el: '#vue-app',
    data: {
        name: 'Shabab',
        threads: [
            {
                name: 'Ryan', email: 'Blah blah', link: 'ya'
            },
            {
                name: 'Donald', email: 'I suck so bad', link: 'ya'
            },
            {
                name: 'Donald', email: 'I suck so bad', link: 'ya'
            },
            {
                name: 'Raymond', email: 'Yo i am cool', link: 'ya'
            }
        ]
    },
    methods: {
        getThreads: function () {
            var self = this;
            $.ajax({
                type: "GET",
//                url: "../../api/threads",
                url: "https://jsonplaceholder.typicode.com/users",
                dataType: "json",
                success: function (result) {
                    self.threads = result;
                }
            });
        }
    }
});