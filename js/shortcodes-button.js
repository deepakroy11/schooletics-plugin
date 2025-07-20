/**
 * Scholastic Core Shortcodes Button
 */

(function() {
    tinymce.create('tinymce.plugins.ScholasticShortcodes', {
        init: function(ed, url) {
            ed.addButton('scholastic_shortcodes', {
                title: 'Scholastic Shortcodes',
                icon: 'icon dashicons-awards',
                onclick: function() {
                    ed.windowManager.open({
                        title: 'Insert Scholastic Shortcode',
                        body: [
                            {
                                type: 'listbox',
                                name: 'shortcode',
                                label: 'Select Shortcode',
                                values: [
                                    {text: 'Services', value: 'scholastic_services count="6" columns="3"'},
                                    {text: 'Projects', value: 'scholastic_projects count="6" columns="3"'},
                                    {text: 'Team Members', value: 'scholastic_team count="4" columns="4"'},
                                    {text: 'Testimonials', value: 'scholastic_testimonials count="3" columns="3"'}
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
    tinymce.PluginManager.add('scholastic_shortcodes', tinymce.plugins.ScholasticShortcodes);
})();