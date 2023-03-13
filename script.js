function init() {
    Tabletop.init( { key: ‘https://docs.google.com/spreadsheets/d/1yop8uzej2g8k6DMfgG639RRXkowtuORrD-7ILU8l_4Y/edit#gid=0',
    callback: function(data, tabletop) { 
    console.log(data)
    },
    simpleSheet: true } )
    }
    window.addEventListener(‘DOMContentLoaded’, init)

