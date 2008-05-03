<?php

class pts_CustomGraph extends pts_Graph
{
	function __construct($Title, $SubTitle, $YTitle)
	{
		if(is_file(PTS_USER_DIR . "graph-config.xml"))
			$file = file_get_contents(PTS_USER_DIR . "graph-config.xml");
		else
			$file = "";
		$read_config = new tandem_XmlReader($file);

		$this->graph_attr_width = pts_read_graph_config(P_GRAPH_SIZE_WIDTH, null, $read_config); // Graph width
		$this->graph_attr_height = pts_read_graph_config(P_GRAPH_SIZE_HEIGHT, null, $read_config);; // Graph height

		// Colors
		$this->graph_color_notches = pts_read_graph_config(P_GRAPH_COLOR_NOTCHES, null, $read_config); // Color for notches
		$this->graph_color_text = pts_read_graph_config(P_GRAPH_COLOR_TEXT, null, $read_config); // Color for text
		$this->graph_color_border = pts_read_graph_config(P_GRAPH_COLOR_BORDER, null, $read_config); // Color for border (if used)
		$this->graph_color_main_headers = pts_read_graph_config(P_GRAPH_COLOR_MAINHEADERS, null, $read_config); // Color of main text headers
		$this->graph_color_headers = pts_read_graph_config(P_GRAPH_COLOR_HEADERS, null, $read_config); // Color of other headers
		$this->graph_color_background = pts_read_graph_config(P_GRAPH_COLOR_BACKGROUND, null, $read_config); // Color of background
		$this->graph_color_body = pts_read_graph_config(P_GRAPH_COLOR_BODY, null, $read_config); // Color of graph body
		$this->graph_color_body_text = pts_read_graph_config(P_GRAPH_COLOR_BODYTEXT, null, $read_config); // Color of graph body text
		$this->graph_color_body_light = pts_read_graph_config(P_GRAPH_COLOR_ALTERNATE, null, $read_config); // Color of the border around graph bars (if doing a bar graph)

		$this->graph_color_paint = explode(", ", pts_read_graph_config(P_GRAPH_COLOR_PAINT, null, $read_config)); // Colors to use for the bars / lines, one color for each key

		// Text
		$this->graph_watermark_text = pts_read_graph_config(P_GRAPH_WATERMARK, null, $read_config); // watermark
		$this->graph_font = pts_read_graph_config(P_GRAPH_FONT_TYPE, null, $read_config); // TTF file name
		$this->graph_font_size_heading = pts_read_graph_config(P_GRAPH_FONT_SIZE_HEADERS, null, $read_config); // Font size of headings
		$this->graph_font_size_bars = pts_read_graph_config(P_GRAPH_FONT_SIZE_TEXT, null, $read_config); // Font size for text on the bars/objects
		$this->graph_font_size_identifiers = pts_read_graph_config(P_GRAPH_FONT_SIZE_IDENTIFIERS, null, $read_config); // Font size of identifiers
		$this->graph_font_size_sub_heading = pts_read_graph_config(P_GRAPH_FONT_SIZE_SUBHEADERS, null, $read_config); // Font size of headers
		$this->graph_font_size_axis_heading = pts_read_graph_config(P_GRAPH_FONT_SIZE_AXIS, null, $read_config); // Font size of axis headers

		$this->graph_attr_big_border = pts_read_graph_config(P_GRAPH_RENDERBORDER, null, $read_config); // Border around graph or not
		$this->graph_attr_marks = pts_read_graph_config(P_GRAPH_MARKCOUNT, null, $read_config); // Number of marks to make on vertical axis

		parent::__construct($Title, $SubTitle, $YTitle);
	}
}

?>
