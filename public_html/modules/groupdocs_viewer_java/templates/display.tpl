<head>

    <script type="text/javascript"
            src="{trim($params['server_url'])}/GetJsHandler?script=libs/jquery-1.9.1.min.js"></script>

    <script type="text/javascript"
            src="{trim($params['server_url'])}/GetJsHandler?script=libs/jquery-ui-1.10.3.min.js"></script>

    <script type="text/javascript"
            src="{trim($params['server_url'])}/GetJsHandler?script=libs/knockout-2.2.1.js"></script>

    <script type="text/javascript" src="{trim($params['server_url'])}/GetJsHandler?script=libs/turn.min.js"></script>

    <script type="text/javascript"
            src="{trim($params['server_url'])}/GetJsHandler?script=libs/modernizr.2.6.2.Transform2d.min.js"></script>

    <script type="text/javascript">
        if (!window.Modernizr.csstransforms) {
            var scriptLoad = document.createElement("script");
            scriptLoad.setAttribute("type", "text/javascript");
            scriptLoad.setAttribute("src", "{trim($params['server_url'])}/GetJsHandler?script=libs/turn.html4.min.js");
            document.getElementsByTagName("head")[0].appendChild(scriptLoad);
        }
    </script>


    <script type="text/javascript"
            src="{trim($params['server_url'])}/GetJsHandler?script=installableViewer.min.js"></script>

    <script type="text/javascript">$.ui.groupdocsViewer.prototype.applicationPath = '{trim($params['server_url'])}/';</script>

    <script type="text/javascript">$.ui.groupdocsViewer.prototype.useHttpHandlers = true;</script>

    <script type="text/javascript"
            src="{trim($params['server_url'])}/GetJsHandler?script=GroupdocsViewer.all.min.js"></script>

    {cms_stylesheet}
    <link rel="stylesheet" type="text/css" href="{trim($params['server_url'])}/GetCssHandler?script=bootstrap.css">

    <link rel="stylesheet" type="text/css"
          href="{trim($params['server_url'])}/GetCssHandler?script=GroupdocsViewer.all.min.css">

    <link rel="stylesheet" type="text/css"
          href="{trim($params['server_url'])}/GetCssHandler?script=jquery-ui-1.10.3.dialog.min.css">
</head>
<body>
<h1>GroupDocs.Viewer for Java</h1>
<div id="content">
<div id="test"
     style="width:{trim($params['width'])}px;height:{trim($params['height'])}px;overflow:hidden;position:relative;margin-bottom:20px;background-color:gray;border:1px solid #ccc;"></div>
</div>
<script>
    $(function () {
        var localizedStrings = null;
        var thumbsImageBase64Encoded = null;
        $('#test').groupdocsViewer({ filePath: '',
            docViewerId: 'doc_viewer1',
            quality: 100,
            showThumbnails: true,
            openThumbnails: true,
            initialZoom: 100,
            zoomToFitWidth: true,
            zoomToFitHeight: false,
            width: 1000,
            height: 500,
            backgroundColor: '',
            showFolderBrowser: true,
            showPrint: true,
            showDownload: true,
            showZoom: true,
            showPaging: true,
            showViewerStyleControl: true,
            showSearch: true,
            preloadPagesCount: 0,
            viewerStyle: 1,
            supportTextSelection: true,
            usePdfPrinting: false,
            localizedStrings: localizedStrings,
            thumbsImageBase64Encoded: thumbsImageBase64Encoded,
            toolbarButtonsBoxShadowStyle: '',
            toolbarButtonsBoxShadowHoverStyle: '',
            thumbnailsContainerBackgroundColor: '',
            thumbnailsContainerBorderRightColor: '',
            toolbarBorderBottomColor: '',
            toolbarInputFieldBorderColor: '',
            toolbarButtonBorderColor: '',
            toolbarButtonBorderHoverColor: '',
            thumbnailsContainerWidth: 0,
            jqueryFileDownloadCookieName: 'jqueryFileDownloadJSForGD',
            showDownloadErrorsInPopup: true,
            showImageWidth: false,
            showHeader: true,
            minimumImageWidth: 0,
            enableStandardErrorHandling: true

        });
    });
</script>
</body>