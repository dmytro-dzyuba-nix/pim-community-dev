'use strict';

define(
    [
        'jquery',
        'underscore',
        'text!pim/template/system/flash_message'
    ],
    function ($, _, flashMessageTemplate) {
        return {
            queue: [],
            defaults: {
                container: '#flash-messages .flash-messages-holder',
                delay: false,
                template: _.template(flashMessageTemplate),
                flash: true
            },
            icons: {
                '': 'icon-infos.svg',
                'success': 'icon-check.svg',
                'error': 'icon-warning-redlight.svg',
                'warning': 'icon-warning-orangelight.svg'
            },
            closeIcons: {
                '': 'icon-delete-bluedark.svg',
                'success': 'icon-delete-greendark.svg',
                'error': 'icon-delete-reddark.svg',
                'warning': 'icon-delete-orangedark.svg'
            },

            /**
             * Shows notification message
             *
             * @param {(string|boolean)} type 'error'|'success'|'warning'|false
             * @param {string} message text of message
             * @param {Object} options
             *
             * @param {(string|jQuery)} options.container selector of jQuery with container element
             * @param {(number|boolean)} options.delay time in ms to auto close message
             *      or false - means to not close automatically
             * @param {Function} options.template template function
             * @param {boolean} options.flash flag to turn on default delay close call, it's 5s
             */
            notify: function (type, message, options) {
                this.showMessage(type, message, options);
            },

            enqueueMessage: function (type, message, options) {
                this.queue.push(arguments);
            },

            showQueuedMessages: function () {
                while (this.queue.length) {
                    var args = queue.shift();
                    this.showMessage.apply(this, args);
                }
            },

            showMessage: function (type, message, options) {
                var opt = _.extend({}, this.defaults, options || {});
                var delay = opt.delay || (opt.flash && 5000);
                var $el = $(opt.template({
                    type: type,
                    message: message,
                    messageTitle: '',
                    delay: delay,
                    icon: this.icons[type || ''],
                    closeIcon: this.closeIcons[type || '']
                })).appendTo(opt.container);

                // Used to force the browser to visually render the element's styles to be able to use CSS transitions
                $el.offset();
                $el.addClass('AknFlash--visible');

                if (delay) {
                    var timeLeft = delay;
                    var interval = setInterval(function () {
                        $el.find('.flash-timer:first').html(Math.max(parseInt(timeLeft / 1000), 0));
                        timeLeft -= 1000;

                        if (timeLeft <= 0) {
                            $el.removeClass('AknFlash--visible');
                        }

                        if (timeLeft <= -1000) {
                            $el.remove();
                            clearInterval(interval);
                        }
                    }, 1000);
                }
            }
        };
    }
);
