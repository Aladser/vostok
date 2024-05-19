import 'overlayscrollbars/css/OverlayScrollbars.min.css'
import 'overlayscrollbars/js/OverlayScrollbars.min'

export default () => {
    const tables = document.querySelectorAll('.article-table');

    tables.forEach(table => {
        OverlayScrollbars(table, {
            overflowBehavior: {
                x: "scroll",
                y: "hidden"
            },
        });
    });
}