/**
 * schooletics Core Shortcodes Button
 */

(function() {
    tinymce.create('tinymce.plugins.schooleticsShortcodes', {
        init: function(ed, url) {
            ed.addButton('schooletics_shortcodes', {
                title: 'schooletics Shortcodes',
                icon: 'icon dashicons-awards',
                onclick: function() {
                    ed.windowManager.open({
                        title: 'Insert schooletics Shortcode',
                        body: [
                            {
                                type: 'listbox',
                                name: 'shortcode',
                                label: 'Select Shortcode',
                                values: [
                                    {text: 'Services', value: 'schooletics_services count="6" columns="3"'},
                                    {text: 'Projects', value: 'schooletics_projects count="6" columns="3"'},
                                    {text: 'Team Members', value: 'schooletics_team count="4" columns="4"'},
                                    {text: 'Testimonials', value: 'schooletics_testimonials count="3" columns="3"'}
                                ]
                            }
                        ],
                        onsubmit: function(e) {
                            ed.insertContent('[' + e.data.shortcode + ']');
                        }
                    });
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('schooletics_shortcodes', tinymce.plugins.schooleticsShortcodes);
})();