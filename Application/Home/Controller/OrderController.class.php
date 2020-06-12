<?php

namespace Home\Controller;

use Think\Controller;

class OrderController extends GlobalController {
	public function index() {
		$start = date( 'Y-m-d' );;
		$end = date( 'Y-m-d', strtotime( '+1 day' ) );
		$this->assign( 'start', $start );
		$this->assign( 'end', $end );
		$this->display();
	}

	public function roomlist() {
		// var_dump($_POST);exit;
		$post = I( 'post.' );
		// var_dump($post);
		$start = $post['start'] ?: $_SESSION['start'] ?: date( 'Y-m-d' );;
		$end   = $post['end'] ?: $_SESSION['end'] ?: date( 'Y-m-d', strtotime( '+1 day' ) );
		$nums  = $post['nums'] ?: $_SESSION['nums'] ?: 1;
		$code  = $post['code'] ?: $_SESSION['code'];
		$adult = $post['adult'] ?: $_SESSION['adult'] ?: 1;
		$child = $post['child'] ?: $_SESSION['child'] ?: 0;
		// $day = $post['day'] ?: $_SESSION['sdate'];

		$day = ( strtotime( $end ) - strtotime( $start ) ) / 86400;
		if ( $start ) {
			$_SESSION = [
				'start' => $start,
				'end'   => $end,
				'adult' => $adult,
				'child' => $child,
				'day'   => $day,
				'nums'  => $nums,
				'code'  => $code,
			];
		}
		// var_dump($_SESSION);exit;
		$room = M( 'Roomtype' )->order( 'id desc' )->select();

		$hotel_code  = 'UAHZJ';
		$roomHuodong = M( 'hotel2_room_huodong', 'ims_', 'DB_WE7' );

		$list = array();
		foreach ( $room as $value ) {
			// var_dump($value);
			//多语言支持
			if ( cookie( 'think_language' ) == "en-us" ) {
				$value['title']       = $value['title_en'];
				$value['description'] = $value['description_en'];
			} else {
				$value['title']       = $value['title'];
				$value['description'] = $value['description'];
			}
			$roomtype = M( 'Price' )->where( ( "roomid='{$value['id']}' AND start_date<='{$start}' AND end_date>='{$start}' AND start_date<='{$end}' AND end_date>='{$end}'" ) )->order( 'id desc' )->select();
			// var_dump($roomtype);exit;
			// $value['min_price'] = $value['min_price'] < $roomtype['price'] ? $value['min_price'] : $roomtype['price'];
			$roomlist = array();
			foreach ( $roomtype as $a => $rooml ) {
				if ( cookie( 'think_language' ) == "en-us" ) {
					$rooml['title'] = $rooml['title_en'];
					$rooml['area']  = $rooml['area_en'];
					$rooml['bed']   = $rooml['bed_en'];
					$rooml['add']   = $rooml['add_en'];
				} else {
					$rooml['title'] = $rooml['title'];
					$rooml['area']  = $rooml['area'];
					$rooml['bed']   = $rooml['bed'];
					$rooml['add']   = $rooml['add'];
				}
				$hds = $roomHuodong->where( "hotel_code='{$hotel_code}' AND room_code='{$rooml['hp_hcode']}' AND ratecode='{$rooml['hp_picode']}' AND start_time<='{$start}' AND end_time>='{$start}'" )->order( 'id ASC' )->select();
				// var_dump($hds);exit;
				$rooml['nums']  = 1;
				$rooml['price'] = 0;
				foreach ( $hds AS $hd ) {
					if ( $hd['ratecode'] == $rooml['hp_picode'] ) {
						if ( intval( $hd['mprice'] ) ) {
							// $rooml['price'] = $rooml['min_price'] = sprintf("%1.1f", $hd['mprice']);
							$currencyModel = M( 'currencyrate', 'ims_', 'DB_WE7' );
							$currency      = $currencyModel->where( "code='HKD'" )->find();
							// var_dump($currency);exit;
							$rate = $currency['rate'] / 100;
							// var_dump($rate);

							// $rooml['price'] = $rooml['min_price'] =  round($hd['mprice']*$rate,2);
							$rooml['sprice'] = $rooml['min_price'] = $hd['mprice'];
						} else {
							$rooml['nums'] = $hd['nums'];
						}
					}
				}
				$roomlist[] = $rooml;
			}
			if ( intval( $rooml['sprice'] ) == 0 ) {
				unset( $room[ $a ] );
			}
			$value['roomtype'] = $roomlist;

			$list[] = $value;

		}
		// var_dump($list);exit;

		$this->assign( 'start', $start );
		$this->assign( 'end', $end );
		$this->assign( 'nums', $nums );
		$this->assign( 'code', $code );
		$this->assign( 'adult', $adult );
		$this->assign( 'child', $child );
		$this->assign( 'day', $day );
		$this->assign( 'list', $list );
		$this->display();
	}

	public function pay() {
		if ( IS_POST ) {
			// var_dump($_POST);
			$hotelid    = 1110;
			$hotelModel = M( 'hotel2', 'ims_', 'DB_WE7' );
			$hotel      = $hotelModel->where( 'id=' . $hotelid )->find();

			$chinaonline = new \Org\Util\Chinaonline( [
				'chainCode' => $hotel['chaincode'],
				'hotelCode' => $hotel['hotelcode']
			] );
			$startDate   = $_SESSION['start'];
			$endDate     = $_SESSION['end'];
			$day         = ceil( ( strtotime( $endDate ) - strtotime( $startDate ) ) / 86400 );


			$roomid             = intval( I( 'roomid' ) );//房型id
			$id                 = intval( I( 'id' ) ); // 促销活动id
			$data['name']       = I( 'name' );
			$data['sdate']      = $_SESSION['start'] ?: date( 'Y-m-d' );
			$data['edate']      = $_SESSION['end'] ?: date( 'Y-m-d', strtotime( '+1 day' ) );
			$data['adult']      = $_SESSION['adult'];
			$data['child']      = $_SESSION['child'];
			$data['nums']       = $_SESSION['nums'];
			$data['mobile']     = I( 'post.mobile' );
			$data['email']      = I( 'post.email' );
			$data['info']       = I( 'post.info' );
			$data['day']        = $_SESSION['day'] ?: 1;
			$data['paytype']    = I( 'post.paytype' );
			$data['time']       = time();
			$data['paystatu']   = 0;
			$data['statu']      = 0;
			$data['roomtypeid'] = intval( $id );
			$data['roomid']     = intval( $roomid );
			cookie( 'mobile', I( 'mobile' ) );
			// $id = I('post.id');
			// var_dump($data);exit;
			$roomtype = M( 'Price' )->where( 'id=' . $id )->find();

			$room = M( 'roomtype' )->where( 'id=' . $roomid )->find();
			if ( cookie( 'think_language' ) == "en-us" ) {
				$roomtype['title'] = $roomtype['title_en'];
				$room['title']     = $room['title_en'];
			} else {
				$roomtype['title'] = $roomtype['title'];
				$room['title']     = $room['title'];
			}

			$co_params = array(
				'startDate'    => $startDate,
				'endDate'      => $endDate,
				'ratePlanCode' => $roomtype['hp_picode'],
				'roomTypeCode' => $roomtype['hp_hcode'],
				'days'         => $day
			);
			// dump($co_params);
			$room_info = $chinaonline->roomInfo( $co_params );
			// var_dump($room_info);exit;
			if ( $room_info['status'] == 0 ) {
				$this->error( '抱歉该房型暂时不可预订，具体原因：' . $room_info['msg'] );
			}

			$total_fee = $room_info['total'];

			$data['pricetitle'] = $roomtype['title'];
			$data['title']      = $room['title'];
			// $data['sum_price'] = intval($data['day'])*intval($data['nums'])*intval($roomtype['price']);
			$data['sum_price'] = $total_fee;
			$data['ordersn']   = 'WEB' . date( 'ymd' ) . rand( 1000, 9999 );
			// var_dump($data);exit;
			$count = M( 'Order' )->add( $data );
			if ( $count > 0 ) {
				$paytype = intval( $data['paytype'] );

				if ( $paytype == 21 ) {
					$type = "微信支付";
				} elseif ( $paytype == 22 ) {
					$type = "支付宝支付";
				} else {
					$type = "到店支付";
				}

				if ( $paytype == 21 ) {
					//微信支付
					$total_fee = $data['sum_price'];//测试
					// $total_fee = 0.01;//测试
					$data['orderid'] = $count;
					$ordersn         = $data['ordersn'];
					$config          = array(
						//千岛湖安麓
						'appid'      => 'wx8e867869d492246d',
						'mch_id'     => '1526394551',
						'pay_apikey' => 'Abcdefghijklmnopqrstuvwxyz123456',
					//宁海安岚
//						'appid'      => 'wx492cdf2e17a27efb',
//						'mch_id'     => '1515123771',
//						'pay_apikey' => 'chedininghaiemarketing1234567890',
					);

					$wxpay = new \Org\Util\Wxpay( $config );   //初始化类(同时传递参数)

					$wxdata = $wxpay->wxpay( $count, $total_fee, "千岛湖安麓." . "-{$data['title']}{$data['pmtitle']}", $ordersn ); //微信支付
					// dump($wxdata);die();
					if ( $wxdata['return_code'] != 'SUCCESS' ) {
						$this->error( $wxdata['msg'] );
					}
					Vendor( 'phpqrcode.phpqrcode' );
					// ob_start();
					\QRcode::png( $wxdata['code_url'], false, 'L', 8, 0 );
					$data['qrcode'] = base64_encode( ob_get_contents() );
					// // var_dump($data['qrcode']);exit;
					ob_end_clean();

					// dump($data);
					$this->assign( 'data', $data );
					$this->display( 'wechatpay' );
					die;
				}
				if ( $paytype == 22 ) {
					$_SESSION['id']   = $count;
					$data['sumprice'] = $data['sum_price'];//测试
					// $data['sumprice'] = 0.01;//测试
					//支付宝支付

					require_once( $_SERVER['DOCUMENT_ROOT'] . '/alipay/alipayapi.php' );
					$alipay_config['partner']      = '2088131889108717';
					$alipay_config['seller_email'] = 'income.qiandaohu@ahnluh.com';
					$alipay_config['key']          = '6knemdwoiigv8b058557v361oj8e73lf';
					$pay_params ['call_back_url']  = 'http://' . $_SERVER['HTTP_HOST'] . U( 'Order/checkOrder' );
					$pay_params ['order_code']     = $data['ordersn'];
					$pay_params ['total_fee']      = $data['sumprice'];
					$pay_params ['subject']        = "千岛湖安麓";
					//$pay_params ['show_url'] = '';//商品展示

					pay( $pay_params, $alipay_config );
					die;
				}

				if ( $paytype == 3 ) {
					$orderModel = M( 'Order' );
					$order      = $orderModel->where( [ 'id' => $count, 'paystatu' => 0, 'statu' => 0 ] )->find();

					$roomtype     = M( 'Price' )->where( array( 'id' => $order['roomtypeid'] ) )->find();
					$chainCode    = 'CCM';
					$hotelCode    = 'UAHZJ';
					$travel_agent = 'TRAVEL_AGENT';

					$chinaonline = new \Org\Util\Chinaonline( [
						'chainCode' => $chainCode,
						'hotelCode' => $hotelCode
					] );
					//接口查询价格
					$startDate = $order['sdate'];
					$endDate   = $order['edate'];
					$day       = ( strtotime( $endDate ) - strtotime( $startDate ) ) / 86400;
					$co_params = array(
						'startDate'    => $startDate,
						'endDate'      => $endDate,
						'ratePlanCode' => $roomtype['hp_picode'],
						'roomTypeCode' => $roomtype['hp_hcode'],
						'days'         => $day
					);
					// var_dump($co_params);exit;
					$room_info = $chinaonline->roomInfo( $co_params );
					// var_dump($room_info);exit;

					$co_comments   = [];
					$day_price_arr = [];
					$date_array    = $room_info['data'];
//            dump($date_array);die;
					foreach ( $date_array AS $day_price ) {
						$day_price_arr[] = $day_price['date'] . '/' . $day_price['price'];
					}
					$co_comments[] = trim( $order['info'] );
					$co_comments[] = '渠道订单' . $order['ordersn'];
					$co_comments[] = '日房价' . join( ' ', $day_price_arr );
					$co_comments[] = '到店支付';
					// $co_comments[] = $room['breakfast']==0?'无早':($room['breakfast']==1?'单早':($room['breakfast']==2?'双早':''));
					$co_comments[] = '优惠金额:0';
					$co_comments[] = '总房费：CNY' . $room_info['total'];
					$co_comments[] = '邮箱：' . $order['email'];

					// 订单信息
					$co_data = array(
						'ordersn'       => $order['ordersn'],
						'startDate'     => $startDate,
						'endDate'       => $endDate,
						'numberOfUnits' => 1,
						'ratePlanCode'  => $roomtype['hp_picode'],
						'roomTypeCode'  => $roomtype['hp_hcode'],
						'name'          => $order['name'],
						'mobile'        => $order['mobile'],
						'sex'           => 1,
						'Total'         => $order['sum_price'],
						'dayprices'     => $date_array,
						'guaranteeType' => "6PM",
						'comment'       => join( '|', $co_comments )//备注信息
					);
//             dump($co_data);exit;
					//发送邮件提醒到预订人邮箱
					$days = round( ( strtotime( $data['edate'] ) - strtotime( $data['sdate'] ) ) / 3600 / 24 );
					unset( $chinaonline );
					$chinaonline = new \Org\Util\Chinaonline( array(
						'chainCode'        => $chainCode,
						'hotelCode'        => $hotelCode,
						'type'             => 'order',
						'qualifyingidtype' => $travel_agent,
						'guaranteeType'    => '6PM'
					) );
					// Think\Log::record($chinaonline);
					$resp = $chinaonline->order( $co_data );//预订接口
					// var_dump($resp);exit;
					if ( $resp['status'] == 0 || $resp['orderid'] == '' ) {
						$this->error( $resp['msg'] );
					}
					// var_dump($days);exit;
					$orderModel->where( [ 'id' => $order['id'] ] )->save( array(
						'confirmationid' => $resp['orderid'],
						'statu'          => 1
					) );

					$email        = $data['email'];
					$mail_content = '尊敬的 ' . $data['name'] . ' 先生/女士，您已成功预订“千岛湖安麓酒店”' . '<br>' . '预订房型：' . $data['title'] . $data['pricetitle'] . '<br>' . '订单金额：' . $data['sum_price'] . '<br>' . '客人姓名：' . $data['name'] . '<br>' . '联系电话：' . $data['mobile'] . '<br>' . '入住日期：' . $data['sdate'] . '共' . $days . '天' . '<br>' . '支付方式：到店支付' . '<br>' . '备注信息：' . $data['info'] . '<br>' . '限时取消：订单确认后，客人可在入住日期当天18:00前免费取消或者修改，若需继续保留，请与酒店预订部协商。' . '<br>' . '酒店电话：0571-65050888' . '<br>' . '酒店地址：';
					// var_dump($mail_content);exit;
					sendMail( $email, '新订单提醒', $mail_content );
					$this->success( '订单提交成功', U( 'Order/complete?id=' . $count ), 3 );
				}
			} else {
				$this->error( "提交失败" );
			}
		} else {
			// var_dump($_SESSION);exit;
			$id = I( 'get.id' );
			if ( ! $id ) {
				$this->error( '房型不存在' );
			}
			$roomtype = M( 'Price' )->find( $id );
			// var_dump($roomtype);exit;
			$room = M( 'Roomtype' )->where( 'id=' . $roomtype['roomid'] )->find();
			// var_dump($room);exit;

			$hotelid    = 1110;
			$hotelModel = M( 'hotel2', 'ims_', 'DB_WE7' );
			$hotel      = $hotelModel->where( 'id=' . $hotelid )->find();
			// var_dump($hotel);exit;
			$chinaonline = new \Org\Util\Chinaonline( [
				'chainCode' => $hotel['chaincode'],
				'hotelCode' => $hotel['hotelcode']
			] );
			//接口查询价格
			$startDate = $_SESSION['start'];
			$endDate   = $_SESSION['end'];
			$adult     = $_SESSION['adult'];
			$child     = $_SESSION['child'];
			$nums      = $_SESSION['nums'];
			$code      = $_SESSION['code'];
			$people    = ( intval( $adult ) + intval( $child ) );
			$day       = ( strtotime( $endDate ) - strtotime( $startDate ) ) / 86400;
			$co_params = array(
				'startDate'    => $startDate,
				'endDate'      => $endDate,
				'ratePlanCode' => $roomtype['hp_picode'],
				'roomTypeCode' => $roomtype['hp_hcode'],
				'days'         => $day
			);
			$room_info = $chinaonline->roomInfo( $co_params );
			// var_dump($room_info);exit;
			if ( $room_info['status'] == 0 ) {
				$this->error( '抱歉该房型暂时不可预订，具体原因：' . $room_info['msg'] );
			}
			$total_fee = $room_info['total'];
			// var_dump($day);
			$this->assign( 'roomtype', $roomtype );
			$this->assign( 'total_fee', $total_fee );
			$this->assign( 'startDate', $startDate );
			$this->assign( 'endDate', $endDate );
			$this->assign( 'people', $people );
			$this->assign( 'nums', $nums );
			$this->assign( 'code', $code );
			$this->assign( 'day', $day );
			$this->display();
		}

	}

	public function complete() {
		$orderId = I( 'id', 0, intval );
		if ( ! $orderId ) {
			$this->error( '参数错误' );
		}
		$hotelOrder = M( 'Order' );
		$map['id']  = I( 'get.id' );
		$data       = $hotelOrder->where( $map )->find();
		// var_dump($data);
		// $data['startDate'] = $startDate = date('Y-m-d', $data['sdate']);
		// $data['endDate'] = $endDate = date('Y-m-d', $data['edate']);
		// $data['checkin_info'] = unserialize($data['checkin_info']);
		// var_dump($data);exit;
		if ( empty( $data ) ) {
			$this->error( '未查询到订单或无查看权限' );
		}
		$this->assign( 'data', $data );
		$this->display();
	}


	public function policy() {
		//预约政策
		$policy = D( 'Block' )->get_item_by_title( 'room_policy' );
		$policy = json_decode( $policy['value'], true );
		//多语言支持
		if ( cookie( 'think_language' ) == "en-us" ) {
			$policy['content'] = html_entity_decode( $policy['content_en'] );
		} else {
			$policy['content'] = html_entity_decode( $policy['content'] );
		}
		$this->assign( 'policy', $policy );
		$this->display();
	}

	//微信支付确认
	public function checkWechatpay() {
		$config  = array(
			'appid'      => 'wx8e867869d492246d',
			'mch_id'     => '1526394551',
			'pay_apikey' => 'Abcdefghijklmnopqrstuvwxyz123456',
		);
		$ordersn = I( 'post.ordersn' );
		// $ordersn = 'WEB1902132696';
		if ( empty( $ordersn ) ) {
			$this->error( '订单号错误' );
		}
		$wxpay = new \Org\Util\Wxpay( $config );   //初始化类(同时传递参数)
		$data  = $wxpay->queryOrder( $ordersn );
		// var_dump($data);exit;
		if ( $data['trade_state'] === 'SUCCESS' ) {
			$orderModel = M( 'Order' );
			$order      = $orderModel->where( [ 'ordersn' => $ordersn, 'paystatu' => 0, 'statu' => 0 ] )->find();
			// var_dump($order);
			if ( empty( $order ) ) {
				$this->error( '未查询到订单或订单已处理' );
			}
			$res = $orderModel->where( array( 'id' => $order['id'] ) )->save( array(
				'paystatu'       => 1,
				'transaction_id' => $data['transaction_id']
			) );
			if ( $res === false ) {
				$this->error( '订单更新失败' );
			}

			$promotionModel = M( 'Roomtype' );
			$promotion      = $promotionModel->where( array( 'id' => $order['pmid'] ) )->find();
			// var_dump($promotion);exit;
			$chainCode    = 'CCM';
			$hotelCode    = 'UAHZJ';
			$travel_agent = 'TRAVEL_AGENT';

			$chinaonline = new \Org\Util\Chinaonline( [ 'chainCode' => $chainCode, 'hotelCode' => $hotelCode ] );
			//接口查询价格
			$startDate = $order['sdate'];
			$endDate   = $order['edate'];
			$day       = ( strtotime( $endDate ) - strtotime( $startDate ) ) / 86400;
			$co_params = array(
				'startDate'    => $startDate,
				'endDate'      => $endDate,
				'ratePlanCode' => $promotion['hp_picode'],
				'roomTypeCode' => $promotion['hp_hcode'],
				'days'         => $day
			);
			// var_dump($co_params);exit;
			$room_info     = $chinaonline->roomInfo( $co_params );
			$co_comments   = '';
			$day_price_arr = '';
			$date_array    = $room_info['data'];
			foreach ( $date_array AS $day_price ) {
				$day_price_arr[] = $day_price['date'] . '/' . intval( $day_price['price'] );
			}
			$co_comments[] = trim( $order['info'] );
			$co_comments[] = '渠道订单' . $order['ordersn'];
			$co_comments[] = '日房价' . join( ' ', $day_price_arr );
			$co_comments[] = '微信支付';
			// $co_comments[] = $room['breakfast']==0?'无早':($room['breakfast']==1?'单早':($room['breakfast']==2?'双早':''));
			$co_comments[] = '优惠金额:0';
			$co_comments[] = '总房费：CNY' . intval( $order['sum_price'] ) . '.00';

			// 订单信息
			$co_data = array(
				'ordersn'       => $order['ordersn'],
				'startDate'     => $startDate,
				'endDate'       => $endDate,
				'numberOfUnits' => 1,
				'ratePlanCode'  => $promotion['hp_picode'],
				'roomTypeCode'  => $promotion['hp_hcode'],
				'name'          => $order['name'],
				'mobile'        => $order['mobile'],
				'sex'           => 1,
				'Total'         => $order['sum_price'],
				'dayprices'     => $date_array,
				'guaranteeType' => "PAID",
				'comment'       => join( '|', $co_comments )//备注信息
			);
			// var_dump($co_data);exit;
			unset( $chinaonline );
			$chinaonline = new \Org\Util\Chinaonline( array(
				'chainCode'        => $chainCode,
				'hotelCode'        => $hotelCode,
				'type'             => 'order',
				'qualifyingidtype' => $travel_agent,
				'guaranteeType'    => 'PAID'
			) );
			// Think\Log::record($chinaonline);
			$resp = $chinaonline->order( $co_data );//预订接口
			// var_dump($resp);exit;
			$result = json_encode( $resp );
			Think\Log::record( $result );

			if ( $resp['status'] == 0 || $resp['orderid'] == '' ) {
				$this->error( $resp['msg'] );
			}

			//更新接口订单id 订单状态
			$orderModel->where( [ 'id' => $order['id'] ] )->save( array(
				'confirmationid' => $resp['orderid'],
				'statu'          => 1
			) );

			if ( $order['paytype'] == 21 ) {
				$type = "微信支付";
			} elseif ( $order['paytype'] == 22 ) {
				$type = "支付宝支付";
			} else {
				$type = "到店支付";
			}
			$email        = $order['email'];
			$mail_content = '尊敬的 ' . $order['name'] . ' 先生/女士，您已成功预订“千岛湖安麓酒店”' . '<br>' . '预订房型：' . $order['title'] . $order['pmtitle'] . '<br>' . '订单金额：' . $order['sum_price'] . '<br>' . '订单号：' . $order['ordersn'] . '<br>' . '客人姓名：' . $order['name'] . '<br>' . '联系电话：' . $order['mobile'] . '<br>' . '入住日期：' . $order['sdate'] . '共' . $day . '天' . '<br>' . '支付方式：' . $type . '<br>' . '备注信息：' . $order['info'] . '<br>' . '限时取消：订单确认后，客人可在入住日期当天18:00前免费取消或者修改，若需继续保留，请与酒店预订部协商。' . '<br>' . '酒店电话：+86 0571-65050888' . '<br>' . '酒店地址：中国杭州市淳安县姜家镇灵岩路168号';
			sendMail( $email, '新订单提醒', $mail_content );
			$email1        = "rita1140@163.com";
			$mail_content1 = '尊敬的千岛湖安麓酒店用户，您有新的酒店预订订单，请及时处理！' . '<br>' . '预订房型：' . $order['title'] . $order['pmtitle'] . '<br>' . '订单金额：' . $order['sum_price'] . '<br>' . '订单号：' . $order['ordersn'] . '<br>' . '客人姓名：' . $order['name'] . '<br>' . '联系电话：' . $order['mobile'] . '<br>' . '入住日期：' . $order['sdate'] . '共' . $day . '天' . '<br>' . '支付方式：' . $type . '<br>' . '备注信息：' . $order['info'] . '<br>' . '限时取消：订单确认后，客人可在入住日期当天18:00前免费取消或者修改，若需继续保留，请与酒店预订部协商。' . '<br>' . '酒店电话：+86 0571-65050888' . '<br>' . '酒店地址：中国杭州市淳安县姜家镇灵岩路168号';
			sendMail( $email1, '新订单提醒', $mail_content1 );
			// $tag = I('get.');
			// $corePaylog = M('core_paylog','ims_','DB_WE7');
			// $res = $corePaylog->where(array('tid'=>$order['id'],'uniacid'=>$weid))->save(array('status'=>1, 'tag'=>serialize($tag)));
			// if($res === false){
			//     $this->error('支付记录更新失败');
			// }

			// //更新接口订单id 订单状态
			// $hotelOrder->where(['id' => $order['id']])->save(array('confirmationid' => $resp['orderid'], 'statu' => 1));
			// $this->success('支付成功', U('Jdyd/chenggong?id='.$order['id']),3);
			// $this->pmsOrder($order['id']);
		}
		die( json_encode( $data ) );
	}

	//支付确认
	public function checkOrder() {
		require_once( $_SERVER['DOCUMENT_ROOT'] . "/alipay/alipay.config.php" );
		require_once( $_SERVER['DOCUMENT_ROOT'] . "/alipay/lib/alipay_notify.class.php" );
		//计算得出通知验证结果


		$post = I( 'get.' );
		// var_dump($post);exit;
		$alipay_config['partner']      = '2088131889108717';
		$alipay_config['seller_email'] = 'income.qiandaohu@ahnluh.com';
		$alipay_config['key']          = '6knemdwoiigv8b058557v361oj8e73lf';
		// var_dump($alipay_config);
		$alipayNotify  = new \AlipayNotify( $alipay_config );
		$verify_result = $alipayNotify->verifyReturn();
		// var_dump($verify_result);exit;
		if ( $verify_result ) {//验证成功
			// $oid = $_SESSION['oid'];
			//商户订单号
			$out_trade_no = I( 'out_trade_no' );
			//支付宝交易号
			$trade_no = I( 'trade_no' );
			// var_dump($trade_no);exit;
			//交易状态
			$trade_status = I( 'trade_status' );

			if ( ! strcmp( $trade_status, 'TRADE_FINISHED' ) || ! strcmp( $trade_status, 'TRADE_SUCCESS' ) ) {
				//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//如果有做过处理，不执行商户的业务程序
				$hotelOrder = M( 'Order' );
				$order      = $hotelOrder->where( array( 'ordersn' => $out_trade_no, 'paystatu' => 0 ) )->find();
				if ( empty( $order ) ) {
					$this->error( '未查询到订单或订单已处理' );
				}
				$res = $hotelOrder->where( array( 'id' => $order['id'] ) )->save( array(
					'paystatu'       => 1,
					'transaction_id' => $trade_no
				) );
				if ( $res === false ) {
					$this->error( '订单更新失败' );
				}

				$promotionModel = M( 'Roomtype' );
				$promotion      = $promotionModel->where( array( 'id' => $order['pmid'] ) )->find();
				$chainCode      = 'CCM';
				$hotelCode      = 'UAHZJ';
				$travel_agent   = 'TRAVEL_AGENT';

				$chinaonline = new \Org\Util\Chinaonline( [ 'chainCode' => $chainCode, 'hotelCode' => $hotelCode ] );
				//接口查询价格
				$startDate = $order['sdate'];
				$endDate   = $order['edate'];
				$day       = ( strtotime( $endDate ) - strtotime( $startDate ) ) / 86400;
				$co_params = array(
					'startDate'    => $startDate,
					'endDate'      => $endDate,
					'ratePlanCode' => $promotion['hp_picode'],
					'roomTypeCode' => $promotion['hp_hcode'],
					'days'         => $day
				);
				// var_dump($co_params);
				$room_info     = $chinaonline->roomInfo( $co_params );
				$co_comments   = '';
				$day_price_arr = '';
				$date_array    = $room_info['data'];
				foreach ( $date_array AS $day_price ) {
					$day_price_arr[] = $day_price['date'] . '/' . intval( $day_price['price'] );
				}
				$co_comments[] = trim( $order['info'] );
				$co_comments[] = '渠道订单' . $order['ordersn'];
				$co_comments[] = '日房价' . join( ' ', $day_price_arr );
				$co_comments[] = '支付宝支付';
				// $co_comments[] = $room['breakfast']==0?'无早':($room['breakfast']==1?'单早':($room['breakfast']==2?'双早':''));
				$co_comments[] = '优惠金额:0';
				$co_comments[] = '总房费：CNY' . intval( $room_info['total'] ) . '.00';

				// 订单信息
				$co_data = array(
					'ordersn'       => $order['ordersn'],
					'startDate'     => $startDate,
					'endDate'       => $endDate,
					'numberOfUnits' => 1,
					'ratePlanCode'  => $promotion['hp_picode'],
					'roomTypeCode'  => $promotion['hp_hcode'],
					'name'          => $order['name'],
					'mobile'        => $order['mobile'],
					'sex'           => 1,
					'Total'         => $order['sum_price'],
					'dayprices'     => $date_array,
					'guaranteeType' => "PAID",
					'comment'       => join( '|', $co_comments )//备注信息
				);
				// var_dump($co_data);exit;
				unset( $chinaonline );
				$chinaonline = new \Org\Util\Chinaonline( array(
					'chainCode'        => $chainCode,
					'hotelCode'        => $hotelCode,
					'type'             => 'order',
					'qualifyingidtype' => $travel_agent,
					'guaranteeType'    => 'PAID'
				) );
				// Think\Log::record($chinaonline);
				$resp = $chinaonline->order( $co_data );//预订接口
				// var_dump($resp);exit;
				if ( $resp['status'] == 0 || $resp['orderid'] == '' ) {
					$this->error( $resp['msg'] );
				}

				//更新接口订单id 订单状态
				$hotelOrder->where( [ 'id' => $order['id'] ] )->save( array(
					'confirmationid' => $resp['orderid'],
					'statu'          => 1
				) );

				if ( $order['paytype'] == 21 ) {
					$type = "微信支付";
				} elseif ( $order['paytype'] == 22 ) {
					$type = "支付宝支付";
				} else {
					$type = "到店支付";
				}
				$email        = $order['email'];
				$mail_content = '尊敬的 ' . $order['name'] . ' 先生/女士，您已成功预订“千岛湖安麓酒店”' . '<br>' . '预订房型：' . $order['title'] . $order['pmtitle'] . '<br>' . '订单金额：' . $order['sum_price'] . '<br>' . '订单号：' . $order['ordersn'] . '<br>' . '客人姓名：' . $order['name'] . '<br>' . '联系电话：' . $order['mobile'] . '<br>' . '入住日期：' . $order['sdate'] . '共' . $day . '天' . '<br>' . '支付方式：' . $type . '<br>' . '备注信息：' . $order['info'] . '<br>' . '限时取消：订单确认后，客人可在入住日期当天18:00前免费取消或者修改，若需继续保留，请与酒店预订部协商。' . '<br>' . '酒店电话：+86 0571-65050888' . '<br>' . '酒店地址：中国杭州市淳安县姜家镇灵岩路168号';
				sendMail( $email, '新订单提醒', $mail_content );
				$email1        = "rita1140@163.com";
				$mail_content1 = '尊敬的千岛湖安麓酒店用户，您有新的酒店预订订单，请及时处理！' . '<br>' . '预订房型：' . $order['title'] . $order['pmtitle'] . '<br>' . '订单金额：' . $order['sum_price'] . '<br>' . '订单号：' . $order['ordersn'] . '<br>' . '客人姓名：' . $order['name'] . '<br>' . '联系电话：' . $order['mobile'] . '<br>' . '入住日期：' . $order['sdate'] . '共' . $day . '天' . '<br>' . '支付方式：' . $type . '<br>' . '备注信息：' . $order['info'] . '<br>' . '限时取消：订单确认后，客人可在入住日期当天18:00前免费取消或者修改，若需继续保留，请与酒店预订部协商。' . '<br>' . '酒店电话：+86 0571-65050888' . '<br>' . '酒店地址：中国杭州市淳安县姜家镇灵岩路168号';
				sendMail( $email1, '新订单提醒', $mail_content1 );
				// $tag = I('get.');
				// $corePaylog = M('core_paylog','ims_','DB_WE7');
				// $res = $corePaylog->where(array('tid'=>$order['id'],'uniacid'=>$weid))->save(array('status'=>1, 'tag'=>serialize($tag)));
				// if($res === false){
				//     $this->error('支付记录更新失败');
				// }

				// //更新接口订单id 订单状态
				// $hotelOrder->where(['id' => $order['id']])->save(array('confirmationid' => $resp['orderid'], 'statu' => 1));
				$this->success( '支付成功', U( 'Jdyd/chenggong?id=' . $order['id'] ), 3 );
			} else {
				$this->error( '状态异常:' . $_GET['trade_status'] );
			}
		} else {
			$this->error( '支付宝安全验证失败' );
		}
	}

}
