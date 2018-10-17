$(document).ready(function() {
    var map = {};
    console.log($('.typeahead-user'));
    $('.typeahead-user').typeahead({
        source: function (query, process) {
            console.log('salut');
            return $.get('autocomplete', { query: query, dataType: 'json' }, function (data) {
                map = {};
                usernames = [];

                $.each(JSON.parse(data), function (i, user) {
                    map[user.mail] = user;
                    usernames.push(user.mail);
                });

                process(usernames);

                return process(usernames);
            });
        },
        updater: function(mail) {
            console.log(mail);
            if(mail !== '') {
                var option = "<option selected>" + mail + "</option>";
                $('#email_cible').append(option);
                $('.typeahead-user').val("");
                return mail;
            }
            return mail;
        }
    });
});